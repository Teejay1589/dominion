<?php

namespace App\Policies;

use App\User;
use App\Post;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the post.
     *
     * @param  \App\User  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    // public function view(User $user, Post $post)
    public function view(User $user)
    {
        return $user->is_permitted_to('view', Post::table());
    }

    /**
     * Determine whether the user can create posts.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->is_permitted_to('create', Post::table());
    }

    /**
     * Determine whether the user can update the post.
     *
     * @param  \App\User  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    // public function update(User $user, Post $post)
    public function update(User $user)
    {
        return $user->is_permitted_to('update', Post::table());
    }

    /**
     * Determine whether the user can delete the post.
     *
     * @param  \App\User  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    // public function delete(User $user, Post $post)
    public function delete(User $user)
    {
        return $user->is_permitted_to('delete', Post::table());
    }
}
