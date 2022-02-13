<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TypeResource\Pages;
use App\Filament\Resources\TypeResource\RelationManagers;
use App\Models\Type;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class TypeResource extends Resource
{
    protected static ?string $model = Type::class;

    protected static ?string $navigationIcon = 'heroicon-s-tag';

    protected static ?string $navigationGroup = 'Configurações';

    protected static ?string $label = 'Tipo';

    protected static ?string $pluralLabel = 'Tipos';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Nome')
                    ->maxLength(250)
                    ->required(),
                Forms\Components\Select::make('used_by')
                    ->label('Usado em')
                    ->helperText('Módulos do sistema')
                    ->options(Type::MODULES)
                    ->required(),
                Forms\Components\Toggle::make('is_default')
                    ->label('Padrão')
                    ->helperText('Selecione qual padrão para uso em cada módulo do sistema'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('#')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('name')
                    ->label('Nome')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\BadgeColumn::make('used_by')
                    ->label('Usado em')
                    ->sortable()
                    ->searchable()
                    ->colors([
                        'danger',
                    ]),
            ])
            ->filters([
                //
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTypes::route('/'),
        ];
    }
}
