<?php

namespace Database\Seeders\Estados;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CidadesSergipeSeeder extends Seeder {

    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        DB::table('cities')->insert([
        	['city' => 'Amparo de São Francisco', 'state_id' => 26],
            ['city' => 'Aquidabã', 'state_id' => 26],
            ['city' => 'Aracaju', 'state_id' => 26],
            ['city' => 'Arauá', 'state_id' => 26],
            ['city' => 'Areia Branca', 'state_id' => 26],
            ['city' => 'Barra dos Coqueiros', 'state_id' => 26],
            ['city' => 'Boquim', 'state_id' => 26],
            ['city' => 'Brejo Grande', 'state_id' => 26],
            ['city' => 'Campo do Brito', 'state_id' => 26],
            ['city' => 'Canhoba', 'state_id' => 26],
            ['city' => 'Canindé de São Francisco', 'state_id' => 26],
            ['city' => 'Capela', 'state_id' => 26],
            ['city' => 'Carira', 'state_id' => 26],
            ['city' => 'Carmópolis', 'state_id' => 26],
            ['city' => 'Cedro de São João', 'state_id' => 26],
            ['city' => 'Cristinápolis', 'state_id' => 26],
            ['city' => 'Cumbe', 'state_id' => 26],
            ['city' => 'Divina Pastora', 'state_id' => 26],
            ['city' => 'Estância', 'state_id' => 26],
            ['city' => 'Feira Nova', 'state_id' => 26],
            ['city' => 'Frei Paulo', 'state_id' => 26],
            ['city' => 'Gararu', 'state_id' => 26],
            ['city' => 'General Maynard', 'state_id' => 26],
            ['city' => 'Gracho Cardoso', 'state_id' => 26],
            ['city' => 'Ilha das Flores', 'state_id' => 26],
            ['city' => 'Indiaroba', 'state_id' => 26],
            ['city' => 'Itabaiana', 'state_id' => 26],
            ['city' => 'Itabaianinha', 'state_id' => 26],
            ['city' => 'Itabi', 'state_id' => 26],
            ['city' => 'Itaporanga d`Ajuda', 'state_id' => 26],
            ['city' => 'Japaratuba', 'state_id' => 26],
            ['city' => 'Japoatã', 'state_id' => 26],
            ['city' => 'Lagarto', 'state_id' => 26],
            ['city' => 'Laranjeiras', 'state_id' => 26],
            ['city' => 'Macambira', 'state_id' => 26],
            ['city' => 'Malhada dos Bois', 'state_id' => 26],
            ['city' => 'Malhador', 'state_id' => 26],
            ['city' => 'Maruim', 'state_id' => 26],
            ['city' => 'Moita Bonita', 'state_id' => 26],
            ['city' => 'Monte Alegre de Sergipe', 'state_id' => 26],
            ['city' => 'Muribeca', 'state_id' => 26],
            ['city' => 'Neópolis', 'state_id' => 26],
            ['city' => 'Nossa Senhora Aparecida', 'state_id' => 26],
            ['city' => 'Nossa Senhora da Glória', 'state_id' => 26],
            ['city' => 'Nossa Senhora das Dores', 'state_id' => 26],
            ['city' => 'Nossa Senhora de Lourdes', 'state_id' => 26],
            ['city' => 'Nossa Senhora do Socorro', 'state_id' => 26],
            ['city' => 'Pacatuba', 'state_id' => 26],
            ['city' => 'Pedra Mole', 'state_id' => 26],
            ['city' => 'Pedrinhas', 'state_id' => 26],
            ['city' => 'Pinhão', 'state_id' => 26],
            ['city' => 'Pirambu', 'state_id' => 26],
            ['city' => 'Poço Redondo', 'state_id' => 26],
            ['city' => 'Poço Verde', 'state_id' => 26],
            ['city' => 'Porto da Folha', 'state_id' => 26],
            ['city' => 'Propriá', 'state_id' => 26],
            ['city' => 'Riachão do Dantas', 'state_id' => 26],
            ['city' => 'Riachuelo', 'state_id' => 26],
            ['city' => 'Ribeirópolis', 'state_id' => 26],
            ['city' => 'Rosário do Catete', 'state_id' => 26],
            ['city' => 'Salgado', 'state_id' => 26],
            ['city' => 'Santa Luzia do Itanhy', 'state_id' => 26],
            ['city' => 'Santa Rosa de Lima', 'state_id' => 26],
            ['city' => 'Santana do São Francisco', 'state_id' => 26],
            ['city' => 'Santo Amaro das Brotas', 'state_id' => 26],
            ['city' => 'São Cristóvão', 'state_id' => 26],
            ['city' => 'São Domingos', 'state_id' => 26],
            ['city' => 'São Francisco', 'state_id' => 26],
            ['city' => 'São Miguel do Aleixo', 'state_id' => 26],
            ['city' => 'Simão Dias', 'state_id' => 26],
            ['city' => 'Siriri', 'state_id' => 26],
            ['city' => 'Telha', 'state_id' => 26],
            ['city' => 'Tobias Barreto', 'state_id' => 26],
            ['city' => 'Tomar do Geru', 'state_id' => 26],
            ['city' => 'Umbaúba', 'state_id' => 26]
        ]);

        $this->command->info('Cidades de Sergipe importadas com sucesso!');
    }
}
