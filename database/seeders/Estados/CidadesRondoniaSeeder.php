<?php

namespace Database\Seeders\Estados;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CidadesRondoniaSeeder extends Seeder {

    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        DB::table('cities')->insert([
        	['city' => 'Alta Floresta d`Oeste', 'state_id' => 22],
            ['city' => 'Alto Alegre dos Parecis', 'state_id' => 22],
            ['city' => 'Alto Paraíso', 'state_id' => 22],
            ['city' => 'Alvorada d`Oeste', 'state_id' => 22],
            ['city' => 'Ariquemes', 'state_id' => 22],
            ['city' => 'Buritis', 'state_id' => 22],
            ['city' => 'Cabixi', 'state_id' => 22],
            ['city' => 'Cacaulândia', 'state_id' => 22],
            ['city' => 'Cacoal', 'state_id' => 22],
            ['city' => 'Campo Novo de Rondônia', 'state_id' => 22],
            ['city' => 'Candeias do Jamari', 'state_id' => 22],
            ['city' => 'Castanheiras', 'state_id' => 22],
            ['city' => 'Cerejeiras', 'state_id' => 22],
            ['city' => 'Chupinguaia', 'state_id' => 22],
            ['city' => 'Colorado do Oeste', 'state_id' => 22],
            ['city' => 'Corumbiara', 'state_id' => 22],
            ['city' => 'Costa Marques', 'state_id' => 22],
            ['city' => 'Cujubim', 'state_id' => 22],
            ['city' => 'Espigão d`Oeste', 'state_id' => 22],
            ['city' => 'Governador Jorge Teixeira', 'state_id' => 22],
            ['city' => 'Guajará-Mirim', 'state_id' => 22],
            ['city' => 'Itapuã do Oeste', 'state_id' => 22],
            ['city' => 'Jaru', 'state_id' => 22],
            ['city' => 'Ji-Paraná', 'state_id' => 22],
            ['city' => 'Machadinho d`Oeste', 'state_id' => 22],
            ['city' => 'Ministro Andreazza', 'state_id' => 22],
            ['city' => 'Mirante da Serra', 'state_id' => 22],
            ['city' => 'Monte Negro', 'state_id' => 22],
            ['city' => 'Nova Brasilândia d`Oeste', 'state_id' => 22],
            ['city' => 'Nova Mamoré', 'state_id' => 22],
            ['city' => 'Nova União', 'state_id' => 22],
            ['city' => 'Novo Horizonte do Oeste', 'state_id' => 22],
            ['city' => 'Ouro Preto do Oeste', 'state_id' => 22],
            ['city' => 'Parecis', 'state_id' => 22],
            ['city' => 'Pimenta Bueno', 'state_id' => 22],
            ['city' => 'Pimenteiras do Oeste', 'state_id' => 22],
            ['city' => 'Porto Velho', 'state_id' => 22],
            ['city' => 'Presidente Médici', 'state_id' => 22],
            ['city' => 'Primavera de Rondônia', 'state_id' => 22],
            ['city' => 'Rio Crespo', 'state_id' => 22],
            ['city' => 'Rolim de Moura', 'state_id' => 22],
            ['city' => 'Santa Luzia d`Oeste', 'state_id' => 22],
            ['city' => 'São Felipe d`Oeste', 'state_id' => 22],
            ['city' => 'São Francisco do Guaporé', 'state_id' => 22],
            ['city' => 'São Miguel do Guaporé', 'state_id' => 22],
            ['city' => 'Seringueiras', 'state_id' => 22],
            ['city' => 'Teixeirópolis', 'state_id' => 22],
            ['city' => 'Theobroma', 'state_id' => 22],
            ['city' => 'Urupá', 'state_id' => 22],
            ['city' => 'Vale do Anari', 'state_id' => 22],
            ['city' => 'Vale do Paraíso', 'state_id' => 22],
            ['city' => 'Vilhena', 'state_id' => 22]
        ]);

        $this->command->info('Cidades de Rondônia importadas com sucesso!');
    }
}
