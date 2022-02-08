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
            'name' => $this->faker->name('male'),
            'email' => $this->faker->safeEmail(),
            'type_id' => '1',
            'federal_id' => $this->faker->cpf(),
            'state_id' => $this->faker->rg(),
            'sex' => Sex::Male->value,
            'defaulter' => false,
            'comments' => $this->faker->paragraph(3, true),
        ];
    }

    public function pessoaJuridica()
    {
        return $this->state(function (array $attributes) {
            return [
                'name' => $this->faker->company(),
                'email' => $this->faker->companyEmail(),
                'type_id' => '2',
                'federal_id' => $this->faker->cnpj(),
                'state_id' => 'ISENTO',
                'sex' => Sex::NotApplicable->value,
            ];
        });
    }

    public function female()
    {
        return $this->state(function (array $attributes) {
            return [
                'name' => $this->faker->name('female'),
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

    public function defaulter()
    {
        return $this->state(function (array $attributes) {
            return [
                'defaulter' => true,
            ];
        });
    }
}
