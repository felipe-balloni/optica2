<?php

declare(strict_types=1);

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'type_id' => '1',
            'federal_id' => \Faker\Factory::create('pt_BR')->cpf(),
            'state_id' => \Faker\Factory::create('pt_BR')->rg(),
            'sex' => 'n',
            'defaulter' => 0,
            'comments' => $this->faker->paragraph(3, true),
            'user_id' => 1
        ];
    }
}
