<?php

namespace App\Policies;

use App\Models\SpatiePermissionModelsRole;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy
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
     * @param  \App\Models\SpatiePermissionModelsRole  $spatiePermissionModelsRole
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, SpatiePermissionModelsRole $spatiePermissionModelsRole)
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
     * @param  \App\Models\SpatiePermissionModelsRole  $spatiePermissionModelsRole
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, SpatiePermissionModelsRole $spatiePermissionModelsRole)
    {
        return $user->can('Editar funções de usuário e permissões');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\SpatiePermissionModelsRole  $spatiePermissionModelsRole
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, SpatiePermissionModelsRole $spatiePermissionModelsRole)
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
     * @param  \App\Models\SpatiePermissionModelsRole  $spatiePermissionModelsRole
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, SpatiePermissionModelsRole $spatiePermissionModelsRole)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\SpatiePermissionModelsRole  $spatiePermissionModelsRole
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, SpatiePermissionModelsRole $spatiePermissionModelsRole)
    {
        //
    }
}
