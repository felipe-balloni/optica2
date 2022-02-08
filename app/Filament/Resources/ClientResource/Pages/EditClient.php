<?php

namespace App\Filament\Resources\ClientResource\Pages;

use App\Filament\Resources\ClientResource;
use App\Models\ClientAddress;
use Closure;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Str;

class EditClient extends EditRecord
{

    protected static string $resource = ClientResource::class;

    public function buttonClick(string $state, string $path)
    {
        $data = ClientAddress::GetAddress($state);

        $id = explode('.', $path);

        if ($data !== 404) {
            $this->data['addresses'][$id[2]]['address_1'] = $data['street'];
            $this->data['addresses'][$id[2]]['address_2'] = $data['neighborhood'];
            $this->data['addresses'][$id[2]]['state_id'] = $data['state'];
            $this->data['addresses'][$id[2]]['city_id'] = $data['city'];
        } else {
            $this->notify('danger', __('CEP não encontrado na base de dados do correios!'));
        }
        $this->notify('success', __('CEP válido!'));
    }

    protected function getRedirectUrl(): ?string
    {
        $resource = static::getResource();

        return $resource::getUrl();
    }
}
