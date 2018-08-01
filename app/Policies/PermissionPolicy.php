<?php

namespace App\Policies;

use App\User;
use App\Permission;
use Illuminate\Auth\Access\HandlesAuthorization;

class PermissionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the permission.
     *
     * @param  \App\User  $user
     * @param  \App\Permission  $permission
     * @return mixed
     */
    // public function view(User $user, Permission $permission)
    public function view(User $user)
    {
        return $user->is_permitted_to('view', Permission::table());
    }

    /**
     * Determine whether the user can create permission.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->is_permitted_to('create', Permission::table());
    }

    /**
     * Determine whether the user can update the permission.
     *
     * @param  \App\User  $user
     * @param  \App\Permission  $permission
     * @return mixed
     */
    // public function update(User $user, Permission $permission)
    public function update(User $user)
    {
        return $user->is_permitted_to('update', Permission::table());
    }

    /**
     * Determine whether the user can delete the permission.
     *
     * @param  \App\User  $user
     * @param  \App\Permission  $permission
     * @return mixed
     */
    // public function delete(User $user, Permission $permission)
    public function delete(User $user)
    {
        return $user->is_permitted_to('delete', Permission::table());
    }
}
