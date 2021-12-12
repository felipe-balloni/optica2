<?php

namespace App\Filament\Resources\StateResource\Pages;

use App\Filament\Resources\StateResource;
use Filament\Resources\Pages\CreateRecord;

class CreateStates extends CreateRecord
{
    protected static string $resource = StateResource::class;

    protected static ?string $title = 'Custom Page Title';

    protected static ?string $navigationLabel = 'Custom Navigation Label';

    protected static ?string $slug = 'custom-url-slug';
}
