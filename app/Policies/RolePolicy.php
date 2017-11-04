<?php

namespace App\Policies;

use App\Model\User;
use App\Model\Role;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy
{
    use HandlesAuthorization;

    public function before(User $user, $ability)
    {
        if ($user->roles->name === 'root') {
            return true;
        }
    }

    /**
     * Determine whether the user can view the role.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\Role  $role
     * @return mixed
     */
    public function view(User $user, Role $role)
    {
        return false;
    }

    /**
     * Determine whether the user can create roles.
     *
     * @param  \App\Model\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can update the role.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\Role  $role
     * @return mixed
     */
    public function update(User $user, Role $role)
    {
        return false;
    }

    /**
     * Determine whether the user can delete the role.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\Role  $role
     * @return mixed
     */
    public function delete(User $user, Role $role)
    {
        return false;
    }
}
