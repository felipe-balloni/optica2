<?php

namespace App\Filament\Resources\ClientResource\Pages;

use App\Filament\Resources\ClientResource;
use App\Filament\Resources\ClientResource\GetPostalCodeData;
use Filament\Resources\Pages\CreateRecord;

class CreateClient extends CreateRecord
{
    use GetPostalCodeData;

    protected static string $resource = ClientResource::class;

    protected static ?string $title = 'Criar';

    protected function getRedirectUrl(): string
    {
        $resource = static::getResource();

        return $resource::getUrl();
    }
}
