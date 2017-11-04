<?php

namespace App\Policies;

use App\Model\User;
use App\Model\Post;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    public function before(User $user, $ability)
    {
        if ($user->roles->name === 'root') {
            return true;
        }
    }

    /**
     * Determine whether the user can view the post.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\Post  $post
     * @return mixed
     */
    public function view(User $user, Post $post)
    {
        return true;
    }

    /**
     * Determine whether the user can create posts.
     *
     * @param  \App\Model\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->roles->name === 'admin' || $user->roles->name === 'redactor';
    }

    /**
     * Determine whether the user can update the post.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\Post  $post
     * @return mixed
     */
    public function update(User $user, Post $post)
    {
        return $user->roles->name === 'admin' || $user->roles->name === 'redactor' || $user->id === $post->user_id;
    }

    /**
     * Determine whether the user can delete the post.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\Post  $post
     * @return mixed
     */
    public function delete(User $user, Post $post)
    {
        return $user->roles->name === 'admin' || $user->roles->name === 'redactor';
    }
}
