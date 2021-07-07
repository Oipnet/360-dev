<?php
namespace Tests\Feature;

use App\Model\Role;

class RolesTest extends TestWithDbCase
{

	/**
	 * @test
	 */
	public function success_create_role()
	{
		factory(Role::class, 3)->create();

		self::assertEquals(3, Role::count());
	}

}