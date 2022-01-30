<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\City;
use App\Models\Type;
use Filament\Tables;
use App\Models\State;
use App\Models\Client;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use App\Forms\Concerns\HasButton;
use Illuminate\Database\Eloquent\Model;
use App\Forms\Components\TextInputButton;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\ClientResource\Pages;

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
                    ->helperText('E-mail válido e único no cadastro de clientes.')
                    ->email()
                    ->unique(ignorable: fn (?Model $record): ?Model => $record)
                    ->required(),
                Forms\Components\Fieldset::make('Dados para Pessoa Física')
                    ->when(fn (callable $get) => $get('type_id') == 1)
                    ->schema([
                        Forms\Components\TextInput::make('federal_id')
                            ->id('cpf')
                            ->label('CPF')
                            ->helperText('CPF no formato 000.000.000-00.')
                            ->maxLength(14)
                            ->mask(fn (Forms\Components\TextInput\Mask $mask) => $mask->pattern('000.000.000-00'))
                            ->rules(['cpf'])
                            ->unique(ignorable: fn ($record) => $record),
                        Forms\Components\TextInput::make('state_id')
                            ->label('RG')
                            ->helperText('RG no formato 00.000.000-00')
                            ->maxLength(15),
                        Forms\Components\TextInput::make('date_birth')
                            ->label('Data de Nascimento')
                            ->type('date')
                            ->helperText('Data de nascimento no formato dd/mm/aaaa.'),
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
                    ->when(fn (callable $get) => $get('type_id') == 2)
                    ->schema([
                        Forms\Components\TextInput::make('federal_id')
                            ->id('cnpj')
                            ->label('CNPJ')
                            ->helperText('CPNJ no formato 00.000.000/0000-00.')
                            ->maxLength(18)
                            ->mask(fn (Forms\Components\TextInput\Mask $mask) => $mask->pattern('00.000.000/0000-00'))
                            ->rules(['cnpj'])
                            ->unique(ignorable: fn ($record) => $record),
                        Forms\Components\TextInput::make('state_id')
                            ->label('Inscrição Estadual')
                            ->maxLength(20)
                            ->helperText('Inscrição Estadual ou ISENTO se não contribuinte.'),
                        Forms\Components\TextInput::make('date_birth')
                            ->label('Data de abertura')
                            ->helperText('Data da abertura no formato dd/mm/yyyy.')
                            ->type('date'),
                    ]),
                Forms\Components\HasManyRepeater::make('Telefones')
                    ->label('Telefones')
                    ->relationship('phones')
                    ->defaultItems(0)
                    ->schema([
                        Forms\Components\Grid::make()
                            ->schema([
                                Forms\Components\Select::make('type_id')
                                    ->label('Tipo do telefone')
                                    ->helperText('Selecione o tipo do telefone.')
                                    ->options(Type::getTypes('Phones'))
                                    ->default(5)
                                    ->required(),
                                Forms\Components\TextInput::make('phone')
                                    ->label('Telefone')
                                    ->helperText('Numero no formato (00) 0000-0000 ou (00) 9000-00000')
                                    ->maxLength(20)
                                    ->tel()
                                    ->mask(fn (Forms\Components\TextInput\Mask $mask) => $mask->pattern('{(00)} 0000-0000[0]'))
                                    ->required(),
                                Forms\Components\TextInput::make('ext')
                                    ->label('Ext')
                                    ->helperText('Ramal, se houver.')
                                    ->maxLength(5),
                            ])
                            ->columns(3),
                    ])->createItemButtonLabel('Adicionar telefone')
                    ->hint('Use o botão "Adicionar telefone" para criar um novo registro ou botão com icone "Lixeira" para excluír.')
                    ->columnSpan(2),
                Forms\Components\HasManyRepeater::make('addresses')
                    ->label('Endereços')
                    ->relationship('addresses')
                    ->defaultItems(0)
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
                                    ->maxLength(9)
                                    ->mask(fn (Forms\Components\TextInput\Mask $mask) => $mask->pattern('00000`-000'))
                                    ->reactive()
                                    ->required(),
                            ]),
                        Forms\Components\Fieldset::make('Endereços')
                            ->schema([
                                Forms\Components\Grid::make()
                                    ->schema([
                                        Forms\Components\TextInput::make('address_1')
                                            ->label('Endereço')
                                            ->helperText('Nome da rua, sem número, por favor, usar notação padrão dos correios: Rua, Av., etc.')
                                            ->required()
                                            ->columnSpan(2),
                                        Forms\Components\TextInput::make('number')
                                            ->label('Número')
                                            ->helperText('Apenas o número ou S/N (sem numero).')
                                            ->required(),
                                    ])
                                    ->columns(3),
                                Forms\Components\Grid::make()
                                    ->schema([
                                        Forms\Components\TextInput::make('complement')
                                            ->label('Complemento')
                                            ->helperText('Complemento do endereço, exemplo: Apto 10, sala 01, etc.'),
                                        Forms\Components\TextInput::make('address_2')
                                            ->label('Bairro')
                                            ->helperText('Nome do Bairro, por favor, usar notação padrão dos correios: Jd., Res., etc.')
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
                                            ->helperText('Selecione a cidade.')
                                            ->hint('selecione o Estado primeiro')
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
                                    ->helperText('Observações relativas ao endereço, exemplos: ponto de referencias, etc.')
                                    ->columnSpan(2),
                            ])
                    ])
                    ->createItemButtonLabel('Adicionar endereço')
                    ->hint('Use o botão "Adicionar endereço" para criar um novo registro ou botão com icone "Lixeira" para excluír.')
                    ->columnSpan(2),
                Forms\Components\Toggle::make('defaulter')
                    ->label('Inadimplente')
                    ->helperText('Marcar este campo irá destacar a linha do cliente nas listagens.')
                    ->default(0),
                Forms\Components\Textarea::make('comments')
                    ->label('Observações gerais')
                    ->helperText('Observações geral sobre este cliente.'),
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
                    ->wrap()
                    ->sortable()
                    ->searchable(),
                Tables\Columns\BadgeColumn::make('type.name')
                    ->label('Tipo pessoa')
                    ->searchable()
                    ->colors(['success']),
                Tables\Columns\TextColumn::make('federal_id')
                    ->label('CFP/CNPJ')
                    ->searchable(),
                Tables\Columns\BooleanColumn::make('defaulter')
                    ->trueColor('danger')
                    ->falseColor('success')
                    ->trueIcon('heroicon-s-thumb-down')
                    ->falseIcon('heroicon-s-thumb-up')
                    ->label('Status'),
            ])
            ->filters([
                Tables\Filters\Filter::make('defaulter')
                    ->query(fn (Builder $query): Builder => $query->where('defaulter', true))
                    ->label('Inadimplente')
            ])
            ->actions([
                Tables\Actions\IconButtonAction::make('view')
                    ->url(fn (Client $record): string => static::getUrl('view', ['record' => $record]))
                    ->icon('heroicon-o-eye'),
                Tables\Actions\IconButtonAction::make('edit')
                    ->url(fn (Client $record): string => static::getUrl('edit', ['record' => $record]))
                    ->icon('heroicon-o-pencil')
                    ->color('warning'),
            ])
            ->defaultSort('id', 'desc');
    }

    protected function getTableActions(): array
    {
        return [
            //
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
