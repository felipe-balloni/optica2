<?php

namespace Database\Seeders\Estados;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CidadesAmapaSeeder extends Seeder {

    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        DB::table('cities')->insert([
        	['city' => 'Amapá', 'state_id' => 3],
			['city' => 'Calçoene', 'state_id' => 3],
			['city' => 'Cutias', 'state_id' => 3],
			['city' => 'Ferreira Gomes', 'state_id' => 3],
			['city' => 'Itaubal', 'state_id' => 3],
			['city' => 'Laranjal do Jari', 'state_id' => 3],
			['city' => 'Macapá', 'state_id' => 3],
			['city' => 'Mazagão', 'state_id' => 3],
			['city' => 'Oiapoque', 'state_id' => 3],
			['city' => 'Pedra Branca do Amaparí', 'state_id' => 3],
			['city' => 'Porto Grande', 'state_id' => 3],
			['city' => 'Pracuúba', 'state_id' => 3],
			['city' => 'Santana', 'state_id' => 3],
			['city' => 'Serra do Navio', 'state_id' => 3],
			['city' => 'Tartarugalzinho', 'state_id' => 3],
			['city' => 'Vitória do Jari', 'state_id' => 3]
        ]);

        $this->command->info('Cidades do Amapá importadas com sucesso!');
    }
}
