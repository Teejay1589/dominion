<?php

namespace App\Policies;

use App\User;
use App\Patient;
use Illuminate\Auth\Access\HandlesAuthorization;

class PatientPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the patient.
     *
     * @param  \App\User  $user
     * @param  \App\Patient  $patient
     * @return mixed
     */
    // public function view(User $user, Patient $patient)
    public function view(User $user)
    {
        return $user->is_permitted_to('view', Patient::table());
    }

    /**
     * Determine whether the user can create patients.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->is_permitted_to('create', Patient::table());
    }

    /**
     * Determine whether the user can update the patient.
     *
     * @param  \App\User  $user
     * @param  \App\Patient  $patient
     * @return mixed
     */
    // public function update(User $user, Patient $patient)
    public function update(User $user)
    {
        return $user->is_permitted_to('update', Patient::table());
    }

    /**
     * Determine whether the user can delete the patient.
     *
     * @param  \App\User  $user
     * @param  \App\Patient  $patient
     * @return mixed
     */
    // public function delete(User $user, Patient $patient)
    public function delete(User $user)
    {
        return $user->is_permitted_to('delete', Patient::table());
    }
}
