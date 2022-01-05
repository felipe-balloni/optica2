<?php

namespace App\Filament\Resources\ClientResource\Pages;

use App\Filament\Resources\ClientResource;
use App\Models\ClientAddress;
use Closure;
use Filament\Resources\Pages\EditRecord;

class EditClient extends EditRecord
{

    protected static string $resource = ClientResource::class;

    public function buttonClick( string $state, string $path)
    {
        $data = ClientAddress::GetAddress($state);

        $id = explode('.', $path);

        if ($data !== 404) {
//            fn(Closure $set) => $set('data.addresses.14288.address_1', $data['street']);

            $this->data['addresses'][$id[2]]['address_1'] = $data['street'];
            $this->data['addresses'][$id[2]]['address_2'] = $data['neighborhood'];
            $this->data['addresses'][$id[2]]['state_id'] = $data['state'];
            $this->data['addresses'][$id[2]]['city_id'] = $data['city'];

        }

    }

}
