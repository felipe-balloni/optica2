<?php

namespace App\Filament\Resources\ClientResource\Pages;

use App\Filament\Resources\ClientResource;
use App\Filament\Resources\ClientResource\GetPostalCodeData;
use Filament\Resources\Pages\EditRecord;

class EditClient extends EditRecord
{
    use GetPostalCodeData;

    protected static string $resource = ClientResource::class;

    protected function getRedirectUrl(): string
    {
        $resource = static::getResource();

        return $resource::getUrl();
    }
}
