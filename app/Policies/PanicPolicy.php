<?php

namespace App\Policies;

use App\Models\Panic;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class PanicPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Panic $panic
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Panic $panic)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Panic $panic
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Panic $panic)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Panic $panic
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Panic $panic)
    {
        return $panic->user_id === $user->id
            ? Response::allow()
            : Response::deny('You can not cancel a panic you did not create.');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Panic $panic
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Panic $panic)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Panic $panic
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Panic $panic)
    {
        //
    }
}
