<?php

namespace App\Filament\Resources\RoleResource\Pages;

use App\Filament\Resources\RoleResource;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListRoles extends ListRecords
{
    protected static string $resource = RoleResource::class;

    protected function getTableQuery(): Builder
    {
        return parent::getTableQuery()
            ->withCount([
                'users',
            ]);
    }
}
