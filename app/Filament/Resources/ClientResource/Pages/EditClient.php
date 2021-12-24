<?php

namespace App\Filament\Resources\ClientResource\Pages;

use App\Filament\Resources\ClientResource;
use App\Forms\Components\TextInputButton;
use App\Forms\Concerns\HasButton;
use App\Models\ClientAddress;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Pages\EditRecord;

class EditClient extends EditRecord
{
    protected static string $resource = ClientResource::class;

    public function getCEP($state)
    {
       ray($state);
       $data = ClientAddress::GetAddress($state);

        ray($data, $this->data);

    }
}
