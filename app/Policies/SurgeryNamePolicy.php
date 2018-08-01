<?php

namespace App\Policies;

use App\User;
use App\SurgeryName;
use Illuminate\Auth\Access\HandlesAuthorization;

class SurgeryNamePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the surgeryName.
     *
     * @param  \App\User  $user
     * @param  \App\SurgeryName  $surgeryName
     * @return mixed
     */
    // public function view(User $user, SurgeryName $surgeryName)
    public function view(User $user)
    {
        return $user->is_permitted_to('view', SurgeryName::table());
    }

    /**
     * Determine whether the user can create surgeryNames.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->is_permitted_to('create', SurgeryName::table());
    }

    /**
     * Determine whether the user can update the surgeryName.
     *
     * @param  \App\User  $user
     * @param  \App\SurgeryName  $surgeryName
     * @return mixed
     */
    // public function update(User $user, SurgeryName $surgeryName)
    public function update(User $user)
    {
        return $user->is_permitted_to('update', SurgeryName::table());
    }

    /**
     * Determine whether the user can delete the surgeryName.
     *
     * @param  \App\User  $user
     * @param  \App\SurgeryName  $surgeryName
     * @return mixed
     */
    // public function delete(User $user, SurgeryName $surgeryName)
    public function delete(User $user)
    {
        return $user->is_permitted_to('delete', SurgeryName::table());
    }
}
