<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $userSuperAdmin = User::factory()->create([
            'name' => 'Super Administrador',
            'email' => 'super.admin@test.com',
            'is_super_admin' => true,
            'is_active' => true,
        ]);

        $roleAdmin = Role::findOrCreate('administrator', 'web');
        $roleUser = Role::findOrCreate('user', 'web');

        $userAdmin = User::factory()->create([
            'name' => 'Administrador',
            'email' => 'admin@test.com',
            'is_active' => true,
         ])->assignRole($roleAdmin);

        $user1 = User::factory()->create([
            'name' => 'Usuário ativo',
            'email' => 'user1@test.com',
            'is_active' => true,
        ])->assignRole($roleUser);

        $user2 = User::factory()->create([
            'name' => 'Usuário inativo',
            'email' => 'user2@test.com',
        ])->assignRole($roleUser);
    }
}
