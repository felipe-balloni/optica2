<?php

namespace Database\Seeders\Estados;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CidadesDistritoFederalSeeder extends Seeder {

    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        DB::table('cities')->insert([
        	['city' => 'Brasília', 'state_id' => 7]
        ]);

        $this->command->info('Cidades do Distrito Federal importadas com sucesso!');
    }
}
