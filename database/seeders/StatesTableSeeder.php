<?php

namespace Database\Seeders;

use App\Models\State;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class StatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('cities')->truncate();
        DB::table('states')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        setlocale(LC_ALL, 'pt_BR');

        $response = Http::get('https://brasilapi.com.br/api/ibge/uf/v1')
            ->collect()
            ->sortBy('nome', SORT_LOCALE_STRING);
        foreach ($response as $data) {
            $state = State::create([
                'state' => $data['nome'],
                'abbreviation' => $data['sigla'],
            ]);

            $response = Http::get('https://brasilapi.com.br/api/ibge/municipios/v1/' . $state->abbreviation)
                ->collect()
                ->sortBy('nome', LC_CTYPE);
            foreach ($response as $data) {
                $cities = $state->cities()->make([
                    'city' => $data['nome'],
                    'cod_ibge' => $data['codigo_ibge'],
                ]);
                $cities->save();
            }
        }
    }
}
