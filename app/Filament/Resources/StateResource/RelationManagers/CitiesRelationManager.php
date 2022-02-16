<?php

namespace App\Filament\Resources\StateResource\RelationManagers;

use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\HasManyRelationManager;
use Filament\Resources\Table;
use Filament\Tables;

class CitiesRelationManager extends HasManyRelationManager
{
    protected static string $relationship = 'cities';

    protected static ?string $recordTitleAttribute = 'city';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('city')
                    ->label('Cidade')
                    ->maxLength(250)
                    ->required(),
                Forms\Components\TextInput::make('cod_ibge')
                    ->label('Cód. IBGE')
                    ->maxLength(250)
                    ->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('city')
                    ->label('Cidade')
                    ->searchable(),
                Tables\Columns\TextColumn::make('cod_ibge')
                    ->label('Cód. IBGE')
                    ->searchable()
            ])
            ->filters([
                //
            ]);
    }
}
