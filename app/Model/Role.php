<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Role
 */
class Role extends Model
{

	const ADMIN  = 'admin';
	const MEMBER = 'member';

	protected $fillable = ['name', 'slug', 'description'];
}
