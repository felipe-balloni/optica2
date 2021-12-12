<?php

namespace App\Policies;

use App\Models\State;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class StatePolicy
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
        return $user->can('Listar estados e cidades');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\State  $state
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, State $state)
    {
        return $user->can('Ver estados e cidades');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->can('Criar estados e cidades');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\State  $state
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, State $state)
    {
        return $user->can('Editar estados e cidades');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\State  $state
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, State $state)
    {
        return $user->can('Excluir estados e cidades');
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
        return $user->can('Excluir múltiplos estados e cidades');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\State  $state
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, State $state)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\State  $state
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, State $state)
    {
        //
    }
}
