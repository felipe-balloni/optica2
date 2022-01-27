<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            array('name' => 'Pessoa Física', 'used_by' => 'Clients'),
            array('name' => 'Pessoa Jurídica', 'used_by' => 'Clients'),
            array('name' => 'Residencial', 'used_by' => 'Phones'),
            array('name' => 'Comercial', 'used_by' => 'Phones'),
            array('name' => 'Celular', 'used_by' => 'Phones'),
            array('name' => 'Residencial', 'used_by' => 'Addresses'),
            array('name' => 'Comercial', 'used_by' => 'Addresses'),
        ];

        foreach ($types as $type) {
            Type::factory()->create($type);
        }
    }
}
