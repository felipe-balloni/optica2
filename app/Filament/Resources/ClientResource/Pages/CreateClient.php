<?php

namespace App\Filament\Resources\ClientResource\Pages;

use App\Filament\Resources\ClientResource;
use App\Models\ClientAddress;
use Filament\Resources\Pages\CreateRecord;

class CreateClient extends CreateRecord
{
    protected static string $resource = ClientResource::class;

    protected static ?string $title = 'Criar';

    public function getCEP($state)
    {
        ray($state);
        $data = ClientAddress::GetAddress($state);

        ray($data, $this->getForms());

    }

}
