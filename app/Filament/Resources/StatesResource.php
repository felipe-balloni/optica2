<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StatesResource\Pages;
use App\Filament\Resources\StatesResource\RelationManagers;
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

class StatesResource extends Resource
{
    protected static ?string $model = State::class;

    protected static ?string $recordTitleAttribute = 'state';

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationGroup = 'Tabelas';

    protected static ?string $label = 'Estado';

    protected static ?string $pluralLabel = 'Estados e Cidades';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('state')
                    ->label('Estado')
                    ->unique()
                    ->required(),
                Forms\Components\TextInput::make('abbreviation')
                    ->label('Abr')
                    ->unique()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('state')
                ->label('Estado'),
                Tables\Columns\TextColumn::make('abbreviation')
                ->label('Abr'),
            ])
            ->filters([
                //
            ]);
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

    public static function getGloballySearchableAttributes(): array
    {
        return ['state', 'cities.city'];
    }

    public static function getGlobalSearchResultDetails(Model $record): array
    {
        return [
            'Abr' => $record->abbreviation
        ];
    }

    protected static function getGlobalSearchEloquentQuery(): Builder
    {
        return parent::getGlobalSearchEloquentQuery()->with(['cities']);
    }

}
