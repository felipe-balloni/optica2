<?php

namespace App\Filament\Resources\ClientResource\Pages;

use App\Filament\Resources\ClientResource;
use App\Models\ClientAddress;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Str;

class CreateClient extends CreateRecord
{
    protected static string $resource = ClientResource::class;

    protected static ?string $title = 'Criar';

    public function buttonClick( string $state, string $path)
    {
        $data = ClientAddress::GetAddress($state);

        $id = explode('.', $path);

        if ($data !== 404) {
            $this->data['addresses'][$id[2]]['address_1'] = $data['street'];
            $this->data['addresses'][$id[2]]['address_2'] = $data['neighborhood'];
            $this->data['addresses'][$id[2]]['state_id'] = $data['state'];
            $this->data['addresses'][$id[2]]['city_id'] = $data['city'];
        }

        $this->notify('danger', __('CEP não encontrado na base de dados!'));

    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        if (Str::length($data['federal_id']) === 11) {
            $data['federal_id'] = preg_replace("/(\d{3})(\d{3})(\d{3})(\d{2})/", "\$1.\$2.\$3-\$4", $data['federal_id']);
        } else if (Str::length($data['federal_id']) === 14) {
            $data['federal_id'] = preg_replace("/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/", "\$1.\$2.\$3/\$4-\$5", $data['federal_id']);
        }
        return $data;
    }

}
