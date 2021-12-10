<?php

namespace Database\Seeders\Estados;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CidadesRoraimaSeeder extends Seeder {

    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        DB::table('cities')->insert([
        	['city' => 'Alto Alegre', 'state_id' => 23],
            ['city' => 'Amajari', 'state_id' => 23],
            ['city' => 'Boa Vista', 'state_id' => 23],
            ['city' => 'Bonfim', 'state_id' => 23],
            ['city' => 'Cantá', 'state_id' => 23],
            ['city' => 'Caracaraí', 'state_id' => 23],
            ['city' => 'Caroebe', 'state_id' => 23],
            ['city' => 'Iracema', 'state_id' => 23],
            ['city' => 'Mucajaí', 'state_id' => 23],
            ['city' => 'Normandia', 'state_id' => 23],
            ['city' => 'Pacaraima', 'state_id' => 23],
            ['city' => 'Rorainópolis', 'state_id' => 23],
            ['city' => 'São João da Baliza', 'state_id' => 23],
            ['city' => 'São Luiz', 'state_id' => 23],
            ['city' => 'Uiramutã', 'state_id' => 23]
        ]);

        $this->command->info('Cidades de Roraima importadas com sucesso!');
    }
}
