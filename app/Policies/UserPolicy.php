<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the user2.
     *
     * @param  \App\User  $user
     * @param  \App\User  $user2
     * @return mixed
     */
    // public function view(User $user, User $user2)
    public function view(User $user)
    {
        return $user->is_permitted_to('view', User::table());
    }

    /**
     * Determine whether the user can create user2.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->is_permitted_to('create', User::table());
    }

    /**
     * Determine whether the user can update the user2.
     *
     * @param  \App\User  $user
     * @param  \App\User  $user2
     * @return mixed
     */
    // public function update(User $user, User $user2)
    public function update(User $user)
    {
        return $user->is_permitted_to('update', User::table());
    }

    /**
     * Determine whether the user can delete the user2.
     *
     * @param  \App\User  $user
     * @param  \App\User  $user2
     * @return mixed
     */
    // public function delete(User $user, User $user2)
    public function delete(User $user)
    {
        return $user->is_permitted_to('delete', User::table());
    }
}
