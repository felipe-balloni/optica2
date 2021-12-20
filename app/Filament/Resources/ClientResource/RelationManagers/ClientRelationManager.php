<?php

namespace App\Filament\Resources\ClientResource\RelationManagers;

use App\Models\City;
use App\Models\ClientAddress;
use App\Models\State;
use App\Models\Type;
use App\Tables\Columns\Address;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\HasManyRelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Support\Facades\Cache;
use Str;

class ClientRelationManager extends HasManyRelationManager
{
    protected static string $relationship = 'addresses';

    protected static ?string $recordTitleAttribute = 'postal_code';

    protected static ?string $label = 'Endereço';

    protected static ?string $pluralLabel = 'Endereços';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('type_id')
                    ->label('Tipo do endereço')
                    ->helperText('Selecione o tipo do endereço.')
                    ->options(Type::getTypes('Addresses'))
                    ->default(6)
                    ->required(),
                Forms\Components\TextInput::make('postal_code')
                    ->label('CEP')
                    ->helperText('Digite o CEP que o sistema irá tentar preencher os demais campos.')
                    ->maxLength(8)
                    ->reactive()
                    ->afterStateUpdated(function (callable $set, $state) {
                        if ( Str::length($state) === 8 ) {
                            $data = ClientAddress::GetAddress($state);
                            if ( $data !== 404 ) {
                                $set('address_1', $data['street']);
                                $set('address_2', $data['neighborhood']);
                                $set('state_id', $data['state']);
                                $set('city_id', $data['city']);
                            }
                        }
                    })
                    ->stateBindingModifiers(['debounce', '1s'])
//                    ->mask(fn (Forms\Components\TextInput\Mask $mask) => $mask->pattern('{9}00000-000') )
                    ->required(),
                Forms\Components\Fieldset::make('Endereços')
                    ->schema([
                        Forms\Components\TextInput::make('address_1')
                            ->label('Endereço')
                            ->required()
                            ->columnSpan(2),
                        Forms\Components\Grid::make()
                        ->schema([
                            Forms\Components\TextInput::make('number')
                                ->label('Número')
                                ->required(),
                            Forms\Components\TextInput::make('complement')
                                ->label('Complemento')
                                ->columnSpan(2),
                        ])
                        ->columns(3),
                        Forms\Components\TextInput::make('address_2')
                            ->label('Bairro')
                            ->required()
                            ->columnSpan(2),
                        Forms\Components\Grid::make()
                            ->schema([
                                Forms\Components\Select::make('state_id')
                                    ->label('Estado')
                                    ->helperText('Selecione o estado.')
                                    ->options(
                                        State::getState()->pluck('state', 'id')
                                    )
                                    ->reactive()
                                    ->afterStateUpdated(function (callable $set) {
                                        $set('city_id', null);
                                    })
                                    ->required(),
                                Forms\Components\Select::make('city_id')
                                    ->label('Cidade')
                                    ->options( function ( callable $get) {
//                                        if ($get('state_id')) {
                                            return City::getCitiesOfState($get('state_id'))->pluck('city', 'id');
//                                        }
                                        return [];
                                    })
                                    ->required(),
                            ])
                            ->columns(2),
                        Forms\Components\Textarea::make('comments')
                            ->rows(1)
                            ->label('Observação geral')
                            ->columnSpan(2),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('type.name')
                    ->label('Tipo'),
                Tables\Columns\TextColumn::make('type.name')
                    ->label('Tipo'),
                Address::make('address')
                    ->label('Endereço'),
            ])
            ->filters([
                //
            ]);
    }
}
