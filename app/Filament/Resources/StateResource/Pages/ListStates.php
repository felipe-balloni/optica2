<?php

namespace App\Filament\Resources\StateResource\Pages;

use App\Filament\Resources\StateResource;
use Filament\Pages\Actions\ButtonAction;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Cache;

class ListStates extends ListRecords
{
    protected static string $resource = StateResource::class;

    protected function getTableQuery(): Builder
    {
        return parent::getTableQuery()
            ->withCount([
                'cities',
            ]);
    }
}
