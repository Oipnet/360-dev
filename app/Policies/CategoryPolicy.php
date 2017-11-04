<?php

namespace App\Policies;

use App\Model\User;
use App\Model\Category;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryPolicy
{
    use HandlesAuthorization;

    public function before(User $user, $ability)
    {
        if ($user->roles->name === 'root') {
            return true;
        }
    }

    /**
     * Determine whether the user can view the category.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\Category  $category
     * @return mixed
     */
    public function view(User $user, Category $category)
    {
        return true;
    }

    /**
     * Determine whether the user can create categories.
     *
     * @param  \App\Model\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->roles->name === 'admin' || $user->roles->name === 'redactor';
    }

    /**
     * Determine whether the user can update the category.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\Category  $category
     * @return mixed
     */
    public function update(User $user, Category $category)
    {
        return $user->roles->name === 'admin' ||
            $user->roles->name === 'redactor' ||
            $user->posts->category_id === $category->id;
    }

    /**
     * Determine whether the user can delete the category.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\Category  $category
     * @return mixed
     */
    public function delete(User $user, Category $category)
    {
        return $user->roles->name === 'admin' || $user->posts->category_id === $category->id;
    }
}
