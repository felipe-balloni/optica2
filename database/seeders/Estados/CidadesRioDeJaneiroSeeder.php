<?php

namespace Database\Seeders\Estados;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CidadesRioDeJaneiroSeeder extends Seeder {

    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        DB::table('cities')->insert([
        	['city' => 'Angra dos Reis', 'state_id' => 19],
            ['city' => 'Aperibé', 'state_id' => 19],
            ['city' => 'Araruama', 'state_id' => 19],
            ['city' => 'Areal', 'state_id' => 19],
            ['city' => 'Armação dos Búzios', 'state_id' => 19],
            ['city' => 'Arraial do Cabo', 'state_id' => 19],
            ['city' => 'Barra do Piraí', 'state_id' => 19],
            ['city' => 'Barra Mansa', 'state_id' => 19],
            ['city' => 'Belford Roxo', 'state_id' => 19],
            ['city' => 'Bom Jardim', 'state_id' => 19],
            ['city' => 'Bom Jesus do Itabapoana', 'state_id' => 19],
            ['city' => 'Cabo Frio', 'state_id' => 19],
            ['city' => 'Cachoeiras de Macacu', 'state_id' => 19],
            ['city' => 'Cambuci', 'state_id' => 19],
            ['city' => 'Campos dos Goytacazes', 'state_id' => 19],
            ['city' => 'Cantagalo', 'state_id' => 19],
            ['city' => 'Carapebus', 'state_id' => 19],
            ['city' => 'Cardoso Moreira', 'state_id' => 19],
            ['city' => 'Carmo', 'state_id' => 19],
            ['city' => 'Casimiro de Abreu', 'state_id' => 19],
            ['city' => 'Comendador Levy Gasparian', 'state_id' => 19],
            ['city' => 'Conceição de Macabu', 'state_id' => 19],
            ['city' => 'Cordeiro', 'state_id' => 19],
            ['city' => 'Duas Barras', 'state_id' => 19],
            ['city' => 'Duque de Caxias', 'state_id' => 19],
            ['city' => 'Engenheiro Paulo de Frontin', 'state_id' => 19],
            ['city' => 'Guapimirim', 'state_id' => 19],
            ['city' => 'Iguaba Grande', 'state_id' => 19],
            ['city' => 'Itaboraí', 'state_id' => 19],
            ['city' => 'Itaguaí', 'state_id' => 19],
            ['city' => 'Italva', 'state_id' => 19],
            ['city' => 'Itaocara', 'state_id' => 19],
            ['city' => 'Itaperuna', 'state_id' => 19],
            ['city' => 'Itatiaia', 'state_id' => 19],
            ['city' => 'Japeri', 'state_id' => 19],
            ['city' => 'Laje do Muriaé', 'state_id' => 19],
            ['city' => 'Macaé', 'state_id' => 19],
            ['city' => 'Macuco', 'state_id' => 19],
            ['city' => 'Magé', 'state_id' => 19],
            ['city' => 'Mangaratiba', 'state_id' => 19],
            ['city' => 'Maricá', 'state_id' => 19],
            ['city' => 'Mendes', 'state_id' => 19],
            ['city' => 'Mesquita', 'state_id' => 19],
            ['city' => 'Miguel Pereira', 'state_id' => 19],
            ['city' => 'Miracema', 'state_id' => 19],
            ['city' => 'Natividade', 'state_id' => 19],
            ['city' => 'Nilópolis', 'state_id' => 19],
            ['city' => 'Niterói', 'state_id' => 19],
            ['city' => 'Nova Friburgo', 'state_id' => 19],
            ['city' => 'Nova Iguaçu', 'state_id' => 19],
            ['city' => 'Paracambi', 'state_id' => 19],
            ['city' => 'Paraíba do Sul', 'state_id' => 19],
            ['city' => 'Parati', 'state_id' => 19],
            ['city' => 'Paty do Alferes', 'state_id' => 19],
            ['city' => 'Petrópolis', 'state_id' => 19],
            ['city' => 'Pinheiral', 'state_id' => 19],
            ['city' => 'Piraí', 'state_id' => 19],
            ['city' => 'Porciúncula', 'state_id' => 19],
            ['city' => 'Porto Real', 'state_id' => 19],
            ['city' => 'Quatis', 'state_id' => 19],
            ['city' => 'Queimados', 'state_id' => 19],
            ['city' => 'Quissamã', 'state_id' => 19],
            ['city' => 'Resende', 'state_id' => 19],
            ['city' => 'Rio Bonito', 'state_id' => 19],
            ['city' => 'Rio Claro', 'state_id' => 19],
            ['city' => 'Rio das Flores', 'state_id' => 19],
            ['city' => 'Rio das Ostras', 'state_id' => 19],
            ['city' => 'Rio de Janeiro', 'state_id' => 19],
            ['city' => 'Santa Maria Madalena', 'state_id' => 19],
            ['city' => 'Santo Antônio de Pádua', 'state_id' => 19],
            ['city' => 'São Fidélis', 'state_id' => 19],
            ['city' => 'São Francisco de Itabapoana', 'state_id' => 19],
            ['city' => 'São Gonçalo', 'state_id' => 19],
            ['city' => 'São João da Barra', 'state_id' => 19],
            ['city' => 'São João de Meriti', 'state_id' => 19],
            ['city' => 'São José de Ubá', 'state_id' => 19],
            ['city' => 'São José do Vale do Rio Pret', 'state_id' => 19],
            ['city' => 'São Pedro da Aldeia', 'state_id' => 19],
            ['city' => 'São Sebastião do Alto', 'state_id' => 19],
            ['city' => 'Sapucaia', 'state_id' => 19],
            ['city' => 'Saquarema', 'state_id' => 19],
            ['city' => 'Seropédica', 'state_id' => 19],
            ['city' => 'Silva Jardim', 'state_id' => 19],
            ['city' => 'Sumidouro', 'state_id' => 19],
            ['city' => 'Tanguá', 'state_id' => 19],
            ['city' => 'Teresópolis', 'state_id' => 19],
            ['city' => 'Trajano de Morais', 'state_id' => 19],
            ['city' => 'Três Rios', 'state_id' => 19],
            ['city' => 'Valença', 'state_id' => 19],
            ['city' => 'Varre-Sai', 'state_id' => 19],
            ['city' => 'Vassouras', 'state_id' => 19],
            ['city' => 'Volta Redonda', 'state_id' => 19]
        ]);

        $this->command->info('Cidades do Rio de Janeiro importadas com sucesso!');
    }
}
