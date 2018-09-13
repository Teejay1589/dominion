<?php

namespace App\Policies;

use App\User;
use App\Sms;
use Illuminate\Auth\Access\HandlesAuthorization;

class SmsPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the sms.
     *
     * @param  \App\User  $user
     * @param  \App\Sms  $sms
     * @return mixed
     */
    // public function view(User $user, Sms $sms)
    public function view(User $user)
    {
        return $user->is_permitted_to('view', Sms::table());
    }

    /**
     * Determine whether the user can create smss.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->is_permitted_to('create', Sms::table());
    }

    /**
     * Determine whether the user can update the sms.
     *
     * @param  \App\User  $user
     * @param  \App\Sms  $sms
     * @return mixed
     */
    // public function update(User $user, Sms $sms)
    public function update(User $user)
    {
        return $user->is_permitted_to('update', Sms::table());
    }

    /**
     * Determine whether the user can delete the sms.
     *
     * @param  \App\User  $user
     * @param  \App\Sms  $sms
     * @return mixed
     */
    // public function delete(User $user, Sms $sms)
    public function delete(User $user)
    {
        return $user->is_permitted_to('delete', Sms::table());
    }
}
