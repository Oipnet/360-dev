<?php
namespace Tests\Feature;

use App\Model\Role;
use App\Model\User;

class UsersTest extends TestWithDbCase
{

    public function testNotAccessDashboardIfIsNotAdmin()
	{
		$role = Role::create([
			'name'         => 'Membre',
			'slug'         => 'member',
			'description'  => 'User can moderate all and can write/edit post'
		]);
        $user      = factory(User::class)->create(['role_id' => $role->id]);
        $response  = $this->actingAs($user)->get('/admin');
        $response->assertStatus(302);
        $response->assertRedirect('/');
    }

    public function testAccessDashboardIfIsAdmin()
    {
    	$role = Role::create([
			'name'         => 'admin',
			'slug'         => 'admin',
			'description'  => 'User can moderate all and can write/edit post'
		]);
        $user      = factory(User::class)->create();
        $response  = $this->actingAs($user)->get('/admin');
        $response->assertStatus(200);
    }

}