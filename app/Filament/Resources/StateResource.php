<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StateResource\Pages;
use App\Filament\Resources\StateResource\RelationManagers;
use App\Models\State;
use Filament\Facades\Filament;
use Filament\Forms;
use Filament\Navigation\NavigationItem;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class StateResource extends Resource
{
    protected static ?string $model = State::class;

    protected static ?string $recordTitleAttribute = 'state';

    protected static ?string $navigationIcon = 'heroicon-s-location-marker';

    protected static ?string $navigationGroup = 'Tabelas';

    protected static ?string $label = 'Estado';

    protected static ?string $pluralLabel = 'Estados e Cidades';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('state')
                    ->label('Estado')
                    ->maxLength(250)
                    ->unique()
                    ->required(),
                Forms\Components\TextInput::make('abbreviation')
                    ->label('Abr')
                    ->maxLength(2)
                    ->unique()
                    ->required(),
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
                Tables\Columns\TextColumn::make('state')
                    ->label('Estado')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('abbreviation')
                    ->label('Abr')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\BadgeColumn::make('cities_count')
                    ->label('Cidades')
                    ->alignRight()
                    ->counts('cities')
                    ->colors(['success'])
                    ->sortable()
            ])
            ->filters([
                //
            ])
            ->defaultSort('state');;
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\CitiesRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListStates::route('/'),
            'create' => Pages\CreateStates::route('/create'),
            'edit' => Pages\EditStates::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return static::getModel()::query();
    }
}
