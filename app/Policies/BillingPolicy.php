<?php

namespace App\Policies;

use App\User;
use App\Billing;
use Illuminate\Auth\Access\HandlesAuthorization;

class BillingPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the billing.
     *
     * @param  \App\User  $user
     * @param  \App\Billing  $billing
     * @return mixed
     */
    // public function view(User $user, Billing $billing)
    public function view(User $user)
    {
        return $user->is_permitted_to('view', Billing::table());
    }

    /**
     * Determine whether the user can create billings.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->is_permitted_to('create', Billing::table());
    }

    /**
     * Determine whether the user can update the billing.
     *
     * @param  \App\User  $user
     * @param  \App\Billing  $billing
     * @return mixed
     */
    // public function update(User $user, Billing $billing)
    public function update(User $user)
    {
        return $user->is_permitted_to('update', Billing::table());
    }

    /**
     * Determine whether the user can delete the billing.
     *
     * @param  \App\User  $user
     * @param  \App\Billing  $billing
     * @return mixed
     */
    // public function delete(User $user, Billing $billing)
    public function delete(User $user)
    {
        return $user->is_permitted_to('delete', Billing::table());
    }
}
