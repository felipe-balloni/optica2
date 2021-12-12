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
                    ->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('city')
                    ->label('Cidade')
                    ->searchable()
            ])
            ->filters([
                //
            ]);
    }
}
