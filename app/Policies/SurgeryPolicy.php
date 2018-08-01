<?php

namespace App\Policies;

use App\User;
use App\Surgery;
use Illuminate\Auth\Access\HandlesAuthorization;

class SurgeryPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the surgery.
     *
     * @param  \App\User  $user
     * @param  \App\Surgery  $surgery
     * @return mixed
     */
    // public function view(User $user, Surgery $surgery)
    public function view(User $user)
    {
        return $user->is_permitted_to('view', Surgery::table());
    }

    /**
     * Determine whether the user can create surgeries.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->is_permitted_to('create', Surgery::table());
    }

    /**
     * Determine whether the user can update the surgery.
     *
     * @param  \App\User  $user
     * @param  \App\Surgery  $surgery
     * @return mixed
     */
    // public function update(User $user, Surgery $surgery)
    public function update(User $user)
    {
        return $user->is_permitted_to('update', Surgery::table());
    }

    /**
     * Determine whether the user can delete the surgery.
     *
     * @param  \App\User  $user
     * @param  \App\Surgery  $surgery
     * @return mixed
     */
    // public function delete(User $user, Surgery $surgery)
    public function delete(User $user)
    {
        return $user->is_permitted_to('delete', Surgery::table());
    }
}
