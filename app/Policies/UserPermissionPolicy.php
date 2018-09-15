<?php

namespace App\Policies;

use App\User;
use App\UserPermission;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPermissionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the userPermission.
     *
     * @param  \App\User  $user
     * @param  \App\UserPermission  $userPermission
     * @return mixed
     */
    // public function view(User $user, UserPermission $userPermission)
    public function view(User $user)
    {
        return $user->is_permitted_to('view', UserPermission::table());
    }

    /**
     * Determine whether the user can create userPermission.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->is_permitted_to('create', UserPermission::table());
    }

    /**
     * Determine whether the user can update the userPermission.
     *
     * @param  \App\User  $user
     * @param  \App\UserPermission  $userPermission
     * @return mixed
     */
    // public function update(User $user, UserPermission $userPermission)
    public function update(User $user)
    {
        return $user->is_permitted_to('update', UserPermission::table());
    }

    /**
     * Determine whether the user can delete the userPermission.
     *
     * @param  \App\User  $user
     * @param  \App\UserPermission  $userPermission
     * @return mixed
     */
    // public function delete(User $user, UserPermission $userPermission)
    public function delete(User $user)
    {
        return $user->is_permitted_to('delete', UserPermission::table());
    }
}
