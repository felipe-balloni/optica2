<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Enums\Sex;
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
            'defaulter' => 0,
            'comments' => $this->faker->paragraph(3, true),
        ];
    }

    public function pessoaFisica()
    {
        return $this->state(function (array $attributes) {
            return [
                'type_id' => '1',
                'federal_id' => $this->faker->cpf(),
                'state_id' => $this->faker->rg(),
            ];
        });
    }

    public function pessoaJuridica()
    {
        return $this->state(function (array $attributes) {
            return [
                'type_id' => '2',
                'federal_id' => $this->faker->cnpj(),
                'state_id' => 'ISENTO',
            ];
        });
    }

    public function male()
    {
        return $this->state(function (array $attributes) {
            return [
                'sex' => Sex::Male->value,
            ];
        });
    }

    public function female()
    {
        return $this->state(function (array $attributes) {
            return [
                'sex' => Sex::Female->value,
            ];
        });
    }

    public function notApplicable()
    {
        return $this->state(function (array $attributes) {
            return [
                'sex' => Sex::NotApplicable->value,
            ];
        });
    }
}
