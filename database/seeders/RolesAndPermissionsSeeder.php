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

//        $actions = [
//            'Listar',
//            'Ver',
//            'Criar',
//            'Editar',
//            'Excluir',
//            'Excluir múltiplos',
//            'Restaurar',
//            'Excluir permanentemente'
//        ];
//
//        // Reset cached roles and permissions
//        app()[PermissionRegistrar::class]->forgetCachedPermissions();
//
//        // create permissions for Users
//        foreach ($actions as $action){
//            Permission::create(['name' => "{$action} usuários"]);
//        };
//
//        // create permissions for Roles
//        foreach ($actions as $action){
//            Permission::create(['name' => "{$action} funções de usuário e permissões"]);
//        };
//
//        // create permissions for States and Cities
//        foreach ($actions as $action){
//            Permission::create(['name' => "{$action} estados e cidades"]);
//        };
//
//        foreach ($actions as $action){
//            Permission::create(['name' => "{$action} tipos"]);
//        };
//
//        $userSuperAdmin = User::factory()->create([
//            'name' => 'Super Administrador',
//            'email' => 'super.admin@test.com',
//            'is_super_admin' => true,
//            'is_active' => true,
//        ]);

        $roleAdmin = Role::create(['name' => 'Administrador']);

        $roleUser = Role::create(['name' => 'Usuário']);

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

        $roleAdmin->givePermissionTo([
            'Listar usuários',
            'Listar funções de usuário e permissões',
            'Listar estados e cidades',
            'Listar tipos',

            'Ver usuários',
            'Ver funções de usuário e permissões',
            'Ver estados e cidades',
            'Ver tipos',

            'Criar usuários',
            'Criar funções de usuário e permissões',
            'Criar estados e cidades',
            'Criar tipos',

            'Editar usuários',
            'Editar funções de usuário e permissões',
            'Editar estados e cidades',
            'Editar tipos',
        ]);
    }
}
