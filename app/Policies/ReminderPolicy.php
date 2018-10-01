<?php

namespace App\Policies;

use App\User;
use App\Reminder;
use Illuminate\Auth\Access\HandlesAuthorization;

class ReminderPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the reminder.
     *
     * @param  \App\User  $user
     * @param  \App\Reminder  $reminder
     * @return mixed
     */
    // public function view(User $user, Reminder $reminder)
    public function view(User $user)
    {
        return $user->is_permitted_to('view', Reminder::table());
    }

    /**
     * Determine whether the user can create reminders.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->is_permitted_to('create', Reminder::table());
    }

    /**
     * Determine whether the user can update the reminder.
     *
     * @param  \App\User  $user
     * @param  \App\Reminder  $reminder
     * @return mixed
     */
    // public function update(User $user, Reminder $reminder)
    public function update(User $user)
    {
        return $user->is_permitted_to('update', Reminder::table());
    }

    /**
     * Determine whether the user can delete the reminder.
     *
     * @param  \App\User  $user
     * @param  \App\Reminder  $reminder
     * @return mixed
     */
    // public function delete(User $user, Reminder $reminder)
    public function delete(User $user)
    {
        return $user->is_permitted_to('delete', Reminder::table());
    }
}
