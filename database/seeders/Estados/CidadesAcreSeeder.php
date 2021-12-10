<?php

namespace Database\Seeders\Estados;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CidadesAcreSeeder extends Seeder {

    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        DB::table('cities')->insert([
            ['city' => 'Acrelândia', 'state_id' => 1],
            ['city' => 'Assis Brasil', 'state_id' => 1],
            ['city' => 'Brasiléia', 'state_id' => 1],
            ['city' => 'Bujari', 'state_id' => 1],
            ['city' => 'Capixaba', 'state_id' => 1],
            ['city' => 'Cruzeiro do Sul', 'state_id' => 1],
            ['city' => 'Epitaciolândia', 'state_id' => 1],
            ['city' => 'Feijó', 'state_id' => 1],
            ['city' => 'Jordão', 'state_id' => 1],
            ['city' => 'Mâncio Lima', 'state_id' => 1],
            ['city' => 'Manoel Urbano', 'state_id' => 1],
            ['city' => 'Marechal Thaumaturgo', 'state_id' => 1],
            ['city' => 'Plácido de Castro', 'state_id' => 1],
            ['city' => 'Porto Acre', 'state_id' => 1],
            ['city' => 'Porto Walter', 'state_id' => 1],
            ['city' => 'Rio Branco', 'state_id' => 1],
            ['city' => 'Rodrigues Alves', 'state_id' => 1],
            ['city' => 'Santa Rosa do Purus', 'state_id' => 1],
            ['city' => 'Sena Madureira', 'state_id' => 1],
            ['city' => 'Senador Guiomard', 'state_id' => 1],
            ['city' => 'Tarauacá', 'state_id' => 1],
            ['city' => 'Xapuri', 'state_id' => 1]
        ]);

        $this->command->info('Cidades do Acre importadas com sucesso!');
    }
}
