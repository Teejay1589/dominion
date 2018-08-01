<?php

namespace App\Policies;

use App\User;
use App\Visit;
use Illuminate\Auth\Access\HandlesAuthorization;

class VisitPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the visit.
     *
     * @param  \App\User  $user
     * @param  \App\Visit  $visit
     * @return mixed
     */
    // public function view(User $user, Visit $visit)
    public function view(User $user)
    {
        return $user->is_permitted_to('view', Visit::table());
    }

    /**
     * Determine whether the user can create visits.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->is_permitted_to('create', Visit::table());
    }

    /**
     * Determine whether the user can update the visit.
     *
     * @param  \App\User  $user
     * @param  \App\Visit  $visit
     * @return mixed
     */
    // public function update(User $user, Visit $visit)
    public function update(User $user)
    {
        return $user->is_permitted_to('update', Visit::table());
    }

    /**
     * Determine whether the user can delete the visit.
     *
     * @param  \App\User  $user
     * @param  \App\Visit  $visit
     * @return mixed
     */
    // public function delete(User $user, Visit $visit)
    public function delete(User $user)
    {
        return $user->is_permitted_to('delete', Visit::table());
    }
}
