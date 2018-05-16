<?php

namespace App;

use App\Favorite\HasFavorites;
use App\User\Role;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
	use HasFavorites;
	use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password', 'roles'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token',];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function posts(): BelongsTo
    {
        return $this->hasMany(Post::class);
    }

    /**
     * @return bool
     */
    public function isAdmin(): bool
    {
        return $this->roles === Role::ADMIN;
    }

    /**
     * @param string $role
     * @return bool True if the parameter role is the same as the connected user.
     */
    public function hasRole(string $role): bool
    {
        return $this->roles === $role;
    }

    public function getRoleAttribute()
    {
        return ucfirst($this->roles);
    }
}
