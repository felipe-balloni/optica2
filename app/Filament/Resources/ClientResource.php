<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ClientResource\Pages;
use App\Filament\Resources\ClientResource\RelationManagers;
use App\Models\Client;
use App\Models\Type;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;

class ClientResource extends Resource
{
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
                    ->options(Type::where('used_by', 'Clients')->pluck('name', 'id'))
                    ->default(1)
                    ->required()
                    ->reactive(),

                Forms\Components\Fieldset::make('Dados para Pessoa Física')
                    ->when(fn (callable $get) => $get('type_id') == 1)
                    ->schema([
                        Forms\Components\TextInput::make('federal_id')
                            ->id('cpf')
                            ->maxLength(14)
                            ->label('CPF')
                            ->mask(fn (Forms\Components\TextInput\Mask $mask) => $mask->pattern('000.000.000-00') ),
                        Forms\Components\TextInput::make('state_id')
                            ->label('RG')
                            ->maxLength(15)
                            ->helperText('RG, se possivel, no formato 00.000.000-00'),
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
                    ->when(fn (callable $get) => $get('type_id') == 2 )
                    ->schema([
                        Forms\Components\TextInput::make('federal_id')
                            ->id('cnpj')
                            ->label('CNPJ')
                            ->maxLength(18)
                            ->mask(fn (Forms\Components\TextInput\Mask $mask) => $mask->pattern('00.000.000/0000-00') ),
                        Forms\Components\TextInput::make('state_id')
                            ->label('Inscrição Estadual')
                            ->maxLength(20)
                            ->helperText('Inscrição Estadual ou ISENTO se não contribuinte.'),
                        Forms\Components\TextInput::make('date_birth')
                            ->label('Data de abertura')
                            ->type('date'),
                    ]),
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
                    ->sortable()
                    ->searchable(),
                Tables\Columns\BadgeColumn::make('type.name')
                    ->label('Tipo pessoa')
                    ->searchable()
                    ->colors(['success']),
                Tables\Columns\TextColumn::make('federal_id')
                    ->label('CFP/CNPJ')
                    ->searchable(),
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
                    ->query(fn (Builder $query): Builder => $query->where('defaulter', true))
                    ->label('Inadimplente')
            ])
            ->actions([
                Tables\Actions\ButtonAction::make('receitas')
                    ->label('Receitas')
                    ->url(fn (Client $record): string => static::getUrl('view', ['record' => $record] ) )
                    ->icon('heroicon-o-annotation')
                    ->color('success'),
                Tables\Actions\ButtonAction::make('view')
                    ->label('Ver')
                    ->url(fn (Client $record): string => static::getUrl('view', ['record' => $record] ) )
                    ->icon('heroicon-o-eye')
//                    ->color('black')
                ,
                Tables\Actions\ButtonAction::make('edit')
                    ->label('Editar')
                    ->url(fn (Client $record): string => static::getUrl('edit', ['record' => $record] ) )
                    ->icon('heroicon-o-pencil')
                    ->color('warning'),
            ])
            ->defaultSort('id', 'desc');
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\ClientRelationManager::class,
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
