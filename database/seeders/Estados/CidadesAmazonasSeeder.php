<?php

namespace Database\Seeders\Estados;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CidadesAmazonasSeeder extends Seeder {

    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        DB::table('cities')->insert([
        	['city' => 'Alvarães', 'state_id' => 4],
            ['city' => 'Amaturá', 'state_id' => 4],
            ['city' => 'Anamã', 'state_id' => 4],
            ['city' => 'Anori', 'state_id' => 4],
            ['city' => 'Apuí', 'state_id' => 4],
            ['city' => 'Atalaia do Norte', 'state_id' => 4],
            ['city' => 'Autazes', 'state_id' => 4],
            ['city' => 'Barcelos', 'state_id' => 4],
            ['city' => 'Barreirinha', 'state_id' => 4],
            ['city' => 'Benjamin Constant', 'state_id' => 4],
            ['city' => 'Beruri', 'state_id' => 4],
            ['city' => 'Boa Vista do Ramos', 'state_id' => 4],
            ['city' => 'Boca do Acre', 'state_id' => 4],
            ['city' => 'Borba', 'state_id' => 4],
            ['city' => 'Caapiranga', 'state_id' => 4],
            ['city' => 'Canutama', 'state_id' => 4],
            ['city' => 'Carauari', 'state_id' => 4],
            ['city' => 'Careiro', 'state_id' => 4],
            ['city' => 'Careiro da Várzea', 'state_id' => 4],
            ['city' => 'Coari', 'state_id' => 4],
            ['city' => 'Codajás', 'state_id' => 4],
            ['city' => 'Eirunepé', 'state_id' => 4],
            ['city' => 'Envira', 'state_id' => 4],
            ['city' => 'Fonte Boa', 'state_id' => 4],
            ['city' => 'Guajará', 'state_id' => 4],
            ['city' => 'Humaitá', 'state_id' => 4],
            ['city' => 'Ipixuna', 'state_id' => 4],
            ['city' => 'Iranduba', 'state_id' => 4],
            ['city' => 'Itacoatiara', 'state_id' => 4],
            ['city' => 'Itamarati', 'state_id' => 4],
            ['city' => 'Itapiranga', 'state_id' => 4],
            ['city' => 'Japurá', 'state_id' => 4],
            ['city' => 'Juruá', 'state_id' => 4],
            ['city' => 'Jutaí', 'state_id' => 4],
            ['city' => 'Lábrea', 'state_id' => 4],
            ['city' => 'Manacapuru', 'state_id' => 4],
            ['city' => 'Manaquiri', 'state_id' => 4],
            ['city' => 'Manaus', 'state_id' => 4],
            ['city' => 'Manicoré', 'state_id' => 4],
            ['city' => 'Maraã', 'state_id' => 4],
            ['city' => 'Maués', 'state_id' => 4],
            ['city' => 'Nhamundá', 'state_id' => 4],
            ['city' => 'Nova Olinda do Norte', 'state_id' => 4],
            ['city' => 'Novo Airão', 'state_id' => 4],
            ['city' => 'Novo Aripuanã', 'state_id' => 4],
            ['city' => 'Parintins', 'state_id' => 4],
            ['city' => 'Pauini', 'state_id' => 4],
            ['city' => 'Presidente Figueiredo', 'state_id' => 4],
            ['city' => 'Rio Preto da Eva', 'state_id' => 4],
            ['city' => 'Santa Isabel do Rio Negro', 'state_id' => 4],
            ['city' => 'Santo Antônio do Içá', 'state_id' => 4],
            ['city' => 'São Gabriel da Cachoeira', 'state_id' => 4],
            ['city' => 'São Paulo de Olivença', 'state_id' => 4],
            ['city' => 'São Sebastião do Uatumã', 'state_id' => 4],
            ['city' => 'Silves', 'state_id' => 4],
            ['city' => 'Tabatinga', 'state_id' => 4],
            ['city' => 'Tapauá', 'state_id' => 4],
            ['city' => 'Tefé', 'state_id' => 4],
            ['city' => 'Tonantins', 'state_id' => 4],
            ['city' => 'Uarini', 'state_id' => 4],
            ['city' => 'Urucará', 'state_id' => 4],
            ['city' => 'Urucurituba', 'state_id' => 4]
        ]);

        $this->command->info('Cidades do Amazonas importadas com sucesso!');
    }
}
