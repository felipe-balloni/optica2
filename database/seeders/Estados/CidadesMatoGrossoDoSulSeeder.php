<?php

namespace Database\Seeders\Estados;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CidadesMatoGrossoDoSulSeeder extends Seeder {

    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        DB::table('cities')->insert([
        	['city' => 'Água Clara', 'state_id' => 12],
            ['city' => 'Alcinópolis', 'state_id' => 12],
            ['city' => 'Amambaí', 'state_id' => 12],
            ['city' => 'Anastácio', 'state_id' => 12],
            ['city' => 'Anaurilândia', 'state_id' => 12],
            ['city' => 'Angélica', 'state_id' => 12],
            ['city' => 'Antônio João', 'state_id' => 12],
            ['city' => 'Aparecida do Taboado', 'state_id' => 12],
            ['city' => 'Aquidauana', 'state_id' => 12],
            ['city' => 'Aral Moreira', 'state_id' => 12],
            ['city' => 'Bandeirantes', 'state_id' => 12],
            ['city' => 'Bataguassu', 'state_id' => 12],
            ['city' => 'Bataiporã', 'state_id' => 12],
            ['city' => 'Bela Vista', 'state_id' => 12],
            ['city' => 'Bodoquena', 'state_id' => 12],
            ['city' => 'Bonito', 'state_id' => 12],
            ['city' => 'Brasilândia', 'state_id' => 12],
            ['city' => 'Caarapó', 'state_id' => 12],
            ['city' => 'Camapuã', 'state_id' => 12],
            ['city' => 'Campo Grande', 'state_id' => 12],
            ['city' => 'Caracol', 'state_id' => 12],
            ['city' => 'Cassilândia', 'state_id' => 12],
            ['city' => 'Chapadão do Sul', 'state_id' => 12],
            ['city' => 'Corguinho', 'state_id' => 12],
            ['city' => 'Coronel Sapucaia', 'state_id' => 12],
            ['city' => 'Corumbá', 'state_id' => 12],
            ['city' => 'Costa Rica', 'state_id' => 12],
            ['city' => 'Coxim', 'state_id' => 12],
            ['city' => 'Deodápolis', 'state_id' => 12],
            ['city' => 'Dois Irmãos do Buriti', 'state_id' => 12],
            ['city' => 'Douradina', 'state_id' => 12],
            ['city' => 'Dourados', 'state_id' => 12],
            ['city' => 'Eldorado', 'state_id' => 12],
            ['city' => 'Fátima do Sul', 'state_id' => 12],
            ['city' => 'Figueirão', 'state_id' => 12],
            ['city' => 'Glória de Dourados', 'state_id' => 12],
            ['city' => 'Guia Lopes da Laguna', 'state_id' => 12],
            ['city' => 'Iguatemi', 'state_id' => 12],
            ['city' => 'Inocência', 'state_id' => 12],
            ['city' => 'Itaporã', 'state_id' => 12],
            ['city' => 'Itaquiraí', 'state_id' => 12],
            ['city' => 'Ivinhema', 'state_id' => 12],
            ['city' => 'Japorã', 'state_id' => 12],
            ['city' => 'Jaraguari', 'state_id' => 12],
            ['city' => 'Jardim', 'state_id' => 12],
            ['city' => 'Jateí', 'state_id' => 12],
            ['city' => 'Juti', 'state_id' => 12],
            ['city' => 'Ladário', 'state_id' => 12],
            ['city' => 'Laguna Carapã', 'state_id' => 12],
            ['city' => 'Maracaju', 'state_id' => 12],
            ['city' => 'Miranda', 'state_id' => 12],
            ['city' => 'Mundo Novo', 'state_id' => 12],
            ['city' => 'Naviraí', 'state_id' => 12],
            ['city' => 'Nioaque', 'state_id' => 12],
            ['city' => 'Nova Alvorada do Sul', 'state_id' => 12],
            ['city' => 'Nova Andradina', 'state_id' => 12],
            ['city' => 'Novo Horizonte do Sul', 'state_id' => 12],
            ['city' => 'Paranaíba', 'state_id' => 12],
            ['city' => 'Paranhos', 'state_id' => 12],
            ['city' => 'Pedro Gomes', 'state_id' => 12],
            ['city' => 'Ponta Porã', 'state_id' => 12],
            ['city' => 'Porto Murtinho', 'state_id' => 12],
            ['city' => 'Ribas do Rio Pardo', 'state_id' => 12],
            ['city' => 'Rio Brilhante', 'state_id' => 12],
            ['city' => 'Rio Negro', 'state_id' => 12],
            ['city' => 'Rio Verde de Mato Grosso', 'state_id' => 12],
            ['city' => 'Rochedo', 'state_id' => 12],
            ['city' => 'Santa Rita do Pardo', 'state_id' => 12],
            ['city' => 'São Gabriel do Oeste', 'state_id' => 12],
            ['city' => 'Selvíria', 'state_id' => 12],
            ['city' => 'Sete Quedas', 'state_id' => 12],
            ['city' => 'Sidrolândia', 'state_id' => 12],
            ['city' => 'Sonora', 'state_id' => 12],
            ['city' => 'Tacuru', 'state_id' => 12],
            ['city' => 'Taquarussu', 'state_id' => 12],
            ['city' => 'Terenos', 'state_id' => 12],
            ['city' => 'Três Lagoas', 'state_id' => 12],
            ['city' => 'Vicentina', 'state_id' => 12]
        ]);

        $this->command->info('Cidades do Mato Grosso do Sul importadas com sucesso!');
    }
}
