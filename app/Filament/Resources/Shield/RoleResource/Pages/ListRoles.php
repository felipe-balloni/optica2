<?php

namespace App\Filament\Resources\Shield\RoleResource\Pages;

use App\Filament\Resources\Shield\RoleResource;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListRoles extends ListRecords
{
    protected static string $resource = RoleResource::class;

    protected function getTableQuery(): Builder
    {
        return static::getResource()::getEloquentQuery()->withCount('permissions');
    }
}
