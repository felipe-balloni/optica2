<?php

namespace App\Filament\Resources\UserResource\RelationManagers;

use Closure;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\BelongsToManyRelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Support\Str;

class RolesRelationManager extends BelongsToManyRelationManager
{
    protected static string $relationship = 'roles';

    protected static ?string $recordTitleAttribute = 'name';

    protected static ?string $label = 'Função';

    protected static ?string $pluralLabel = 'Funções';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label(__('filament-shield::filament-shield.field.name'))
                    ->required()
                    ->maxLength(255)
                    ->afterStateUpdated(fn(Closure $set, $state): string => $set('name', Str::lower($state))),
                Forms\Components\TextInput::make('guard_name')
                    ->label(__('filament-shield::filament-shield.field.guard_name'))
                    ->default(config('filament.auth.guard'))
                    ->nullable()
                    ->maxLength(255)
                    ->afterStateUpdated(fn(Closure $set, $state): string => $set('guard_name', Str::lower($state))),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label(__('filament-shield::filament-shield.column.name'))
                    ->formatStateUsing(fn($state): string => Str::headline($state))
                    ->searchable(),
                Tables\Columns\TextColumn::make('guard_name')
                    ->label(__('filament-shield::filament-shield.column.guard_name'))
                    ->formatStateUsing(fn($state): string => Str::headline($state)),
            ])
            ->filters([
                //
            ]);
    }
}
