<?php

namespace App\Policies;

use App\Models\Permission;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PermissionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return $user->can('Listar funções de usuário e permissões');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Permission $permission)
    {
        return $user->can('Ver funções de usuário e permissões');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->can('Criar funções de usuário e permissões');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Permission $permission)
    {
        return $user->can('Editar funções de usuário e permissões');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Permission $permission)
    {
        return $user->can('Excluir funções de usuário e permissões');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $model
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function deleteAny(User $user)
    {
        return $user->can('Excluir múltiplos funções de usuário e permissões');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Permission $permission)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Permission $permission)
    {
        //
    }
}
