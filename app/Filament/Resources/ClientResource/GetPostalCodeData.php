<?php

namespace App\Filament\Resources\ClientResource;

use App\Models\ClientAddress;

trait GetPostalCodeData
{
    public function buttonClick(string $state, string $path)
    {
        if (empty($state)) {
            $this->notify('warning', __('CEP não informado!'));
            return;
        }

        $data = ClientAddress::GetAddress($state);

        $id = explode('.', $path);

        if ($data !== 404) {
            $this->data['addresses'][$id[2]]['address_1'] = $data['street'];
            $this->data['addresses'][$id[2]]['address_2'] = $data['neighborhood'];
            $this->data['addresses'][$id[2]]['state_id'] = $data['state'];
            $this->data['addresses'][$id[2]]['city_id'] = $data['city'];

            $this->notify('success', __('CEP válido!'));
        } else {
            $this->notify('danger', __('CEP não encontrado na base de dados do correios!'));
        }
    }
}
