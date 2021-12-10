<?php

namespace Database\Seeders\Estados;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CidadesEspiritoSantoSeeder extends Seeder {

    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        DB::table('cities')->insert([
        	['city' => 'Afonso Cláudio', 'state_id' => 8],
            ['city' => 'Água Doce do Norte', 'state_id' => 8],
            ['city' => 'Águia Branca', 'state_id' => 8],
            ['city' => 'Alegre', 'state_id' => 8],
            ['city' => 'Alfredo Chaves', 'state_id' => 8],
            ['city' => 'Alto Rio Novo', 'state_id' => 8],
            ['city' => 'Anchieta', 'state_id' => 8],
            ['city' => 'Apiacá', 'state_id' => 8],
            ['city' => 'Aracruz', 'state_id' => 8],
            ['city' => 'Atilio Vivacqua', 'state_id' => 8],
            ['city' => 'Baixo Guandu', 'state_id' => 8],
            ['city' => 'Barra de São Francisco', 'state_id' => 8],
            ['city' => 'Boa Esperança', 'state_id' => 8],
            ['city' => 'Bom Jesus do Norte', 'state_id' => 8],
            ['city' => 'Brejetuba', 'state_id' => 8],
            ['city' => 'Cachoeiro de Itapemirim', 'state_id' => 8],
            ['city' => 'Cariacica', 'state_id' => 8],
            ['city' => 'Castelo', 'state_id' => 8],
            ['city' => 'Colatina', 'state_id' => 8],
            ['city' => 'Conceição da Barra', 'state_id' => 8],
            ['city' => 'Conceição do Castelo', 'state_id' => 8],
            ['city' => 'Divino de São Lourenço', 'state_id' => 8],
            ['city' => 'Domingos Martins', 'state_id' => 8],
            ['city' => 'Dores do Rio Preto', 'state_id' => 8],
            ['city' => 'Ecoporanga', 'state_id' => 8],
            ['city' => 'Fundão', 'state_id' => 8],
            ['city' => 'Governador Lindenberg', 'state_id' => 8],
            ['city' => 'Guaçuí', 'state_id' => 8],
            ['city' => 'Guarapari', 'state_id' => 8],
            ['city' => 'Ibatiba', 'state_id' => 8],
            ['city' => 'Ibiraçu', 'state_id' => 8],
            ['city' => 'Ibitirama', 'state_id' => 8],
            ['city' => 'Iconha', 'state_id' => 8],
            ['city' => 'Irupi', 'state_id' => 8],
            ['city' => 'Itaguaçu', 'state_id' => 8],
            ['city' => 'Itapemirim', 'state_id' => 8],
            ['city' => 'Itarana', 'state_id' => 8],
            ['city' => 'Iúna', 'state_id' => 8],
            ['city' => 'Jaguaré', 'state_id' => 8],
            ['city' => 'Jerônimo Monteiro', 'state_id' => 8],
            ['city' => 'João Neiva', 'state_id' => 8],
            ['city' => 'Laranja da Terra', 'state_id' => 8],
            ['city' => 'Linhares', 'state_id' => 8],
            ['city' => 'Mantenópolis', 'state_id' => 8],
            ['city' => 'Marataízes', 'state_id' => 8],
            ['city' => 'Marechal Floriano', 'state_id' => 8],
            ['city' => 'Marilândia', 'state_id' => 8],
            ['city' => 'Mimoso do Sul', 'state_id' => 8],
            ['city' => 'Montanha', 'state_id' => 8],
            ['city' => 'Mucurici', 'state_id' => 8],
            ['city' => 'Muniz Freire', 'state_id' => 8],
            ['city' => 'Muqui', 'state_id' => 8],
            ['city' => 'Nova Venécia', 'state_id' => 8],
            ['city' => 'Pancas', 'state_id' => 8],
            ['city' => 'Pedro Canário', 'state_id' => 8],
            ['city' => 'Pinheiros', 'state_id' => 8],
            ['city' => 'Piúma', 'state_id' => 8],
            ['city' => 'Ponto Belo', 'state_id' => 8],
            ['city' => 'Presidente Kennedy', 'state_id' => 8],
            ['city' => 'Rio Bananal', 'state_id' => 8],
            ['city' => 'Rio Novo do Sul', 'state_id' => 8],
            ['city' => 'Santa Leopoldina', 'state_id' => 8],
            ['city' => 'Santa Maria de Jetibá', 'state_id' => 8],
            ['city' => 'Santa Teresa', 'state_id' => 8],
            ['city' => 'São Domingos do Norte', 'state_id' => 8],
            ['city' => 'São Gabriel da Palha', 'state_id' => 8],
            ['city' => 'São José do Calçado', 'state_id' => 8],
            ['city' => 'São Mateus', 'state_id' => 8],
            ['city' => 'São Roque do Canaã', 'state_id' => 8],
            ['city' => 'Serra', 'state_id' => 8],
            ['city' => 'Sooretama', 'state_id' => 8],
            ['city' => 'Vargem Alta', 'state_id' => 8],
            ['city' => 'Venda Nova do Imigrante', 'state_id' => 8],
            ['city' => 'Viana', 'state_id' => 8],
            ['city' => 'Vila Pavão', 'state_id' => 8],
            ['city' => 'Vila Valério', 'state_id' => 8],
            ['city' => 'Vila Velha', 'state_id' => 8],
            ['city' => 'Vitória', 'state_id' => 8]
        ]);

        $this->command->info('Cidades do Espírito Santo importadas com sucesso!');
    }
}
