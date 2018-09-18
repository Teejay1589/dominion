<?php

namespace App\Policies;

use App\User;
use App\PatientFile;
use Illuminate\Auth\Access\HandlesAuthorization;

class PatientFilePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the post.
     *
     * @param  \App\User  $user
     * @param  \App\PatientFile  $patientFile
     * @return mixed
     */
    // public function view(User $user, PatientFile $patientFile)
    public function view(User $user)
    {
        return $user->is_permitted_to('view', PatientFile::table());
    }

    /**
     * Determine whether the user can create posts.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->is_permitted_to('create', PatientFile::table());
    }

    /**
     * Determine whether the user can update the post.
     *
     * @param  \App\User  $user
     * @param  \App\PatientFile  $patientFile
     * @return mixed
     */
    // public function update(User $user, PatientFile $patientFile)
    public function update(User $user)
    {
        return $user->is_permitted_to('update', PatientFile::table());
    }

    /**
     * Determine whether the user can delete the post.
     *
     * @param  \App\User  $user
     * @param  \App\PatientFile  $patientFile
     * @return mixed
     */
    // public function delete(User $user, PatientFile $patientFile)
    public function delete(User $user)
    {
        return $user->is_permitted_to('delete', PatientFile::table());
    }
}
