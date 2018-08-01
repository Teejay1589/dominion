<?php

namespace App\Policies;

use App\User;
use App\Setting;
use Illuminate\Auth\Access\HandlesAuthorization;

class SettingPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the setting.
     *
     * @param  \App\User  $user
     * @param  \App\Setting  $setting
     * @return mixed
     */
    // public function view(User $user, Setting $setting)
    public function view(User $user)
    {
        return $user->is_permitted_to('view', Setting::table());
    }

    /**
     * Determine whether the user can create setting.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->is_permitted_to('create', Setting::table());
    }

    /**
     * Determine whether the user can update the setting.
     *
     * @param  \App\User  $user
     * @param  \App\Setting  $setting
     * @return mixed
     */
    // public function update(User $user, Setting $setting)
    public function update(User $user)
    {
        return $user->is_permitted_to('update', Setting::table());
    }

    /**
     * Determine whether the user can delete the setting.
     *
     * @param  \App\User  $user
     * @param  \App\Setting  $setting
     * @return mixed
     */
    // public function delete(User $user, Setting $setting)
    public function delete(User $user)
    {
        return $user->is_permitted_to('delete', Setting::table());
    }
}
