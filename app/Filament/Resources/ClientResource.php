<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ClientResource\Pages;
use App\Forms\Components\TextInputButton;
use App\Forms\Concerns\HasButton;
use App\Models\City;
use App\Models\Client;
use App\Models\ClientAddress;
use App\Models\State;
use App\Models\Type;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

class ClientResource extends Resource
{
    use HasButton;

    protected static ?string $model = Client::class;

    protected static ?string $navigationIcon = 'heroicon-s-user-group';

    protected static ?string $recordTitleAttribute = 'name';

    protected static ?string $label = 'Cliente';

    protected static ?string $pluralLabel = 'Clientes';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Nome')
                    ->helperText('Nome completo ou Razão social.')
                    ->maxLength(255)
                    ->required(),
                Forms\Components\Select::make('type_id')
                    ->label('Tipo do cliente')
                    ->helperText('Selecione o tipo do cliente.')
                    ->options(Type::getTypes('Clients'))
                    ->default(1)
                    ->required()
                    ->reactive(),
                Forms\Components\TextInput::make('email')
                    ->label('E-mail')
                    ->email()
                    ->helperText('Nome completo ou Razão social.')
                    ->maxLength(255)
                    ->required(),

                Forms\Components\Fieldset::make('Dados para Pessoa Física')
                    ->when(fn(callable $get) => $get('type_id') == 1)
                    ->schema([
                        Forms\Components\TextInput::make('federal_id')
                            ->id('cpf')
                            ->maxLength(14)
                            ->label('CPF')
                            ->mask(fn(Forms\Components\TextInput\Mask $mask) => $mask->pattern('000.000.000-00')),
                        Forms\Components\TextInput::make('state_id')
                            ->label('RG')
                            ->maxLength(15)
                            ->helperText('RG no formato 00.000.000-00'),
                        Forms\Components\TextInput::make('date_birth')
                            ->label('Data de Nascimento')
                            ->type('date'),
                        Forms\Components\Select::make('sex')
                            ->id('sex')
                            ->label('Sexo')
                            ->default('m')
                            ->options([
                                'm' => 'Masculino',
                                'f' => 'Feminino',
                                'n' => 'n/a',
                            ]),
                    ]),

                Forms\Components\Fieldset::make('Dados para Pessoa Juridica')
                    ->when(fn(callable $get) => $get('type_id') == 2)
                    ->schema([
                        Forms\Components\TextInput::make('federal_id')
                            ->id('cnpj')
                            ->label('CNPJ')
                            ->maxLength(18)
                            ->mask(fn(Forms\Components\TextInput\Mask $mask) => $mask->pattern('00.000.000/0000-00')),
                        Forms\Components\TextInput::make('state_id')
                            ->label('Inscrição Estadual')
                            ->maxLength(20)
                            ->helperText('Inscrição Estadual ou ISENTO se não contribuinte.'),
                        Forms\Components\TextInput::make('date_birth')
                            ->label('Data de abertura')
                            ->type('date'),
                    ]),

                Forms\Components\HasManyRepeater::make('Telefones')
                    ->label('Telefones')
                    ->relationship('phones')
                    ->defaultItems(1)
                    ->schema([
                        Forms\Components\Grid::make()
                            ->schema([
                                Forms\Components\Select::make('type_id')
                                    ->label('Tipo do telefone')
                                    ->helperText('Selecione o tipo do endereço.')
                                    ->options(Type::getTypes('Phones'))
                                    ->default(5)
                                    ->required(),
                                Forms\Components\TextInput::make('phone')
                                    ->label('Telefone')
                                    ->maxLength(20)
                                    ->tel()
                                    ->mask(fn (Forms\Components\TextInput\Mask $mask) => $mask->pattern('{(00)} 0000-0000[0]') )
                                    ->required(),
                                Forms\Components\TextInput::make('ext')
                                    ->label('Ext')
                                    ->maxLength(5),
                            ])
                        ->columns(3),
                    ])->createItemButtonLabel('Adicionar telefone')
                    ->columnSpan(2),

                Forms\Components\HasManyRepeater::make('addresses')
                    ->label('Endereços')
                    ->relationship('addresses')
                    ->defaultItems(1)
                    ->schema([
                        Forms\Components\Grid::make()
                            ->schema([
                                Forms\Components\Select::make('type_id')
                                    ->label('Tipo do endereço')
                                    ->helperText('Selecione o tipo do endereço.')
                                    ->options(Type::getTypes('Addresses'))
                                    ->default(6)
                                    ->required(),
                                TextInputButton::make('postal_code')
                                    ->label('CEP')
                                    ->helperText('Digite o CEP e clique na lupa para preencher os demais campos.')
//                                    ->hint('se não encontrar os campos ficarão vazio e podem ser preenchidos manualmente')
                                    ->maxLength(9)
                                    ->mask(fn(Forms\Components\TextInput\Mask $mask) => $mask->pattern('00000`-000'))
                                    ->reactive()
                                    ->required(),
//                                Forms\Components\TextInput::make('postal_code')
//                                    ->label('CEP')
//                                    ->helperText('Digite o CEP que o sistema irá tentar preencher os demais campos.')
//                                    //                                    ->maxLength(9)
//                                    ->reactive()
//                                    ->afterStateUpdated(function (callable $set, $state) {
//                                        $set('cep', Str::length($state));
//                                        if (Str::length($state) === 9) {
//                                            $data = ClientAddress::GetAddress($state);
//                                             if ($data !== 404) {
////                                                $set('address_1', $data['street']);
////                                                $set('address_2', $data['neighborhood']);
////                                                $set('state_id', $data['state']);
////                                                $set('city_id', $data['city']);
//                                        }
//                                    })
//                                    //                                    ->stateBindingModifiers(['lazy'])
//                                    ->mask(fn(Forms\Components\TextInput\Mask $mask) => $mask->pattern('00.000`-000'))
//                                    ->required(),
                            ]),

                        Forms\Components\Fieldset::make('Endereços')
                            ->schema([
                                Forms\Components\Grid::make()
                                    ->schema([
                                        Forms\Components\TextInput::make('address_1')
                                            ->label('Endereço')
                                            ->required()
                                            ->columnSpan(2),
                                        Forms\Components\TextInput::make('number')
                                            ->label('Número')
                                            ->required(),
                                    ])
                                    ->columns(3),
                                Forms\Components\Grid::make()
                                    ->schema([
                                        Forms\Components\TextInput::make('complement')
                                            ->label('Complemento'),
                                        Forms\Components\TextInput::make('address_2')
                                            ->label('Bairro')
                                            ->required(),
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
                                            ->options(function (callable $get) {
                                                if ($get('state_id')) {
                                                    return City::getCitiesOfState((int)$get('state_id'))->pluck('city', 'id');
                                                }
                                                return [];
                                            })
                                            ->required(),
                                    ]),
                                Forms\Components\Textarea::make('comments')
                                    ->rows(1)
                                    ->label('Observação geral')
                                    ->columnSpan(2),
                            ])
                    ])
                    ->createItemButtonLabel('Adicionar endereço')
                    ->columnSpan(2),

                Forms\Components\Toggle::make('defaulter')
                    ->label('Inadimplente')
                    ->helperText('Marcar este campo irá destacar a linha do cliente nas listagens.')
                    ->default(0),
                Forms\Components\Textarea::make('comments')
                    ->label('Observação geral')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('#')
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')
                    ->label('Nome')
//                    ->limit('17')
                    ->sortable()
                    ->searchable()
                    ->extraAttributes(['class' => 'break-word max-w-48']),
                Tables\Columns\BadgeColumn::make('type.name')
                    ->label('Tipo pessoa')
                    ->searchable()
                    ->colors(['success'])
                    ->extraAttributes(['class' => 'whitespace-nowrap']),
                Tables\Columns\TextColumn::make('federal_id')
                    ->label('CFP/CNPJ')
                    ->searchable()
                    ->extraAttributes(['class' => 'whitespace-nowrap']),
                Tables\Columns\TextColumn::make('old_id')
                    ->label('ID ant.')
                    ->searchable(),
                Tables\Columns\TextColumn::make('sex')
                    ->label('Receitas'),
                Tables\Columns\BooleanColumn::make('defaulter')
                    ->trueColor('danger')
                    ->falseColor('success')
                    ->trueIcon('heroicon-s-thumb-down')
                    ->falseIcon('heroicon-s-thumb-up')
                    ->label('Status'),
            ])
            ->filters([
                Tables\Filters\Filter::make('defaulter')
                    ->query(fn(Builder $query): Builder => $query->where('defaulter', true))
                    ->label('Inadimplente')
            ])
            ->actions([
                Tables\Actions\IconButtonAction::make('receitas')
                    ->url(fn(Client $record): string => static::getUrl('view', ['record' => $record]))
                    ->icon('heroicon-o-annotation')
                    ->color('success'),
                Tables\Actions\IconButtonAction::make('view')
                    ->url(fn(Client $record): string => static::getUrl('view', ['record' => $record]))
                    ->icon('heroicon-o-eye'),
                Tables\Actions\IconButtonAction::make('edit')
                    ->url(fn(Client $record): string => static::getUrl('edit', ['record' => $record]))
                    ->icon('heroicon-o-pencil')
                    ->color('warning'),
            ])
            ->defaultSort('id', 'desc')
            ;
    }

    protected function getTableActions(): array
    {
        return [
            Tables\Actions\IconButtonAction::make('receitas')
                ->url(fn(Client $record): string => static::getUrl('view', ['record' => $record]))
                ->icon('heroicon-o-annotation')
                ->color('success'),
//            Tables\Actions\IconButtonAction::make('view')
//                ->url(fn(Client $record): string => static::getUrl('view', ['record' => $record]))
//                ->icon('heroicon-o-eye'),
//            Tables\Actions\IconButtonAction::make('edit')
//                ->url(fn(Client $record): string => static::getUrl('edit', ['record' => $record]))
//                ->icon('heroicon-o-pencil')
//                ->color('warning'),
        ];
    }

    public static function getRelations(): array
    {
        return [
//            RelationManagers\ClientRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListClients::route('/'),
            'create' => Pages\CreateClient::route('/create'),
            'view' => Pages\ViewClient::route('/{record}'),
            'edit' => Pages\EditClient::route('/{record}/edit'),
        ];
    }
}
