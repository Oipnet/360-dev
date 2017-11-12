<?php
namespace Tests\Feature;

use App\User;

class UsersTest extends TestWithDbCase
{

    public function testNotAccessDashboardIfIsNotAdmin()
    {
        $user      = factory(User::class)->create();
        $response  = $this->actingAs($user)->get('/admin');
        $response->assertStatus(302);
    }

    public function testAccessDashboardIfIsAdmin()
    {
        $user      = factory(User::class)->create(['roles' => 'admin']);
        $response  = $this->actingAs($user)->get('/admin');
        $response->assertStatus(200);
    }

}