<?php
namespace App\Repository;

use App\Model\Role;

/**
 * Role repository
 */
class RoleRepository extends Repository
{

	/**
	 * RoleRepository constructor
	 *
	 * @param Role $role
	 */
	public function __construct(Role $role)
	{
		$this->model = $role;
	}

}