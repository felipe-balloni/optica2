<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\User;
use Illuminate\Database\Seeder;

class ClientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        auth()->loginUsingId(User::whereEmail('super.admin@test.com')->pluck('id'));

        Client::factory()->count(10)->create();
        Client::factory()->count(5)->defaulter()->create();
        Client::factory()->count(10)->female()->create();
        Client::factory()->count(5)->notApplicable()->create();
        Client::factory()->count(10)->pessoaJuridica()->create();

    }
}
