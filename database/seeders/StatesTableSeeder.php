<?php

namespace Database\Seeders;

use Database\Seeders\Estados\CidadesAcreSeeder;
use Database\Seeders\Estados\CidadesAlagoasSeeder;
use Database\Seeders\Estados\CidadesAmapaSeeder;
use Database\Seeders\Estados\CidadesAmazonasSeeder;
use Database\Seeders\Estados\CidadesBahiaSeeder;
use Database\Seeders\Estados\CidadesCearaSeeder;
use Database\Seeders\Estados\CidadesDistritoFederalSeeder;
use Database\Seeders\Estados\CidadesEspiritoSantoSeeder;
use Database\Seeders\Estados\CidadesGoiasSeeder;
use Database\Seeders\Estados\CidadesMaranhaoSeeder;
use Database\Seeders\Estados\CidadesMatoGrossoDoSulSeeder;
use Database\Seeders\Estados\CidadesMatoGrossoSeeder;
use Database\Seeders\Estados\CidadesMinasGeraisSeeder;
use Database\Seeders\Estados\CidadesParaibaSeeder;
use Database\Seeders\Estados\CidadesParanaSeeder;
use Database\Seeders\Estados\CidadesParaSeeder;
use Database\Seeders\Estados\CidadesPernambucoSeeder;
use Database\Seeders\Estados\CidadesPiauiSeeder;
use Database\Seeders\Estados\CidadesRioDeJaneiroSeeder;
use Database\Seeders\Estados\CidadesRioGrandeDoNorteSeeder;
use Database\Seeders\Estados\CidadesRioGrandeDoSulSeeder;
use Database\Seeders\Estados\CidadesRondoniaSeeder;
use Database\Seeders\Estados\CidadesRoraimaSeeder;
use Database\Seeders\Estados\CidadesSantaCatarinaSeeder;
use Database\Seeders\Estados\CidadesSaoPauloSeeder;
use Database\Seeders\Estados\CidadesSergipeSeeder;
use Database\Seeders\Estados\CidadesTocantinsSeeder;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('cities')->truncate();
        DB::table('states')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        DB::table('states')->insert([
            ['state' => 'Acre', 'abbreviation' => 'AC'],
            ['state' => 'Alagoas', 'abbreviation' => 'AL'],
            ['state' => 'Amapá', 'abbreviation' => 'AP'],
            ['state' => 'Amazonas', 'abbreviation' => 'AM'],
            ['state' => 'Bahia', 'abbreviation' => 'BA'],
            ['state' => 'Ceará', 'abbreviation' => 'CE'],
            ['state' => 'Distrito Federal', 'abbreviation' => 'DF'],
            ['state' => 'Espírito Santo', 'abbreviation' => 'ES'],
            ['state' => 'Goiás', 'abbreviation' => 'GO'],
            ['state' => 'Maranhão', 'abbreviation' => 'MA'],
            ['state' => 'Mato Grosso', 'abbreviation' => 'MT'],
            ['state' => 'Mato Grosso do Sul', 'abbreviation' => 'MS'],
            ['state' => 'Minas Gerais', 'abbreviation' => 'MG'],
            ['state' => 'Pará', 'abbreviation' => 'PA'],
            ['state' => 'Paraíba', 'abbreviation' => 'PB'],
            ['state' => 'Paraná', 'abbreviation' => 'PR'],
            ['state' => 'Pernambuco', 'abbreviation' => 'PE'],
            ['state' => 'Piauí', 'abbreviation' => 'PI'],
            ['state' => 'Rio de Janeiro', 'abbreviation' => 'RJ'],
            ['state' => 'Rio Grande do Norte', 'abbreviation' => 'RN'],
            ['state' => 'Rio Grande do Sul', 'abbreviation' => 'RS'],
            ['state' => 'Rondônia', 'abbreviation' => 'RO'],
            ['state' => 'Roraima', 'abbreviation' => 'RR'],
            ['state' => 'Santa Catarina', 'abbreviation' => 'SC'],
            ['state' => 'São Paulo', 'abbreviation' => 'SP'],
            ['state' => 'Sergipe', 'abbreviation' => 'SE'],
            ['state' => 'Tocantins', 'abbreviation' => 'TO']
        ]);

        $this->call([CidadesAcreSeeder::class,
            CidadesAlagoasSeeder::class,
            CidadesAmapaSeeder::class,
            CidadesAmazonasSeeder::class,
            CidadesBahiaSeeder::class,
            CidadesCearaSeeder::class,
            CidadesDistritoFederalSeeder::class,
            CidadesEspiritoSantoSeeder::class,
            CidadesGoiasSeeder::class,
            CidadesMaranhaoSeeder::class,
            CidadesMatoGrossoSeeder::class,
            CidadesMatoGrossoDoSulSeeder::class,
            CidadesMinasGeraisSeeder::class,
            CidadesParaSeeder::class,
            CidadesParaibaSeeder::class,
            CidadesParanaSeeder::class,
            CidadesPernambucoSeeder::class,
            CidadesPiauiSeeder::class,
            CidadesRioDeJaneiroSeeder::class,
            CidadesRioGrandeDoNorteSeeder::class,
            CidadesRioGrandeDoSulSeeder::class,
            CidadesRondoniaSeeder::class,
            CidadesRoraimaSeeder::class,
            CidadesSantaCatarinaSeeder::class,
            CidadesSaoPauloSeeder::class,
            CidadesSergipeSeeder::class,
            CidadesTocantinsSeeder::class
        ]);
    }
}
