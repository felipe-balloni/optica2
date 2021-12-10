<?php

namespace App\Filament\Resources\StatesResource\Pages;

use App\Filament\Resources\StatesResource;
use Filament\Resources\Pages\CreateRecord;

class CreateStates extends CreateRecord
{
    protected static string $resource = StatesResource::class;

    protected static ?string $title = 'Custom Page Title';

    protected static ?string $navigationLabel = 'Custom Navigation Label';

    protected static ?string $slug = 'custom-url-slug';
}
