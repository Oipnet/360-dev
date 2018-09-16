<?php

namespace App\Model;

use App\Favorite\HasFavorites;
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
    protected $fillable = ['name', 'email', 'password', 'role_id', 'discord_id'];

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
	 * @return BelongsTo
	 */
	public function role(): BelongsTo
	{
		return $this->belongsTo(Role::class);
	}

	/**
	 * @return string
	 */
	public function getRole(): string
	{
		return $this->role ? $this->role->name : '';
	}

    /**
     * @return bool
     */
    public function isAdmin(): bool
    {
        return $this->role && ($this->role->slug === Role::ADMIN);
    }

    /**
     * @param string $role
     * @return bool True if the parameter role is the same as the connected user.
     */
    public function hasRole(string $role): bool
    {
        return $this->role->slug === $role;
    }

	/**
	 * @return string
	 */
    public function getDiscordId(): ?string
	{
		return $this->getAttribute('discord_id') ?? null;
	}
}
