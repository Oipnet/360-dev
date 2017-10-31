<?php

use App\Model\Role;
use App\Model\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 50)->create();

        $users = User::all();

        $user = Role::where('name', 'user')->first();
        $admin = Role::where('name', 'admin')->first();
        $redactor = Role::where('name', 'redactor')->first();
        $moderator = Role::where('name', 'moderator')->first();
        $root = Role::where('name', 'root')->first();

        for ($i = 0; $i < 10; $i++) {
            $users[$i]->roles()->save($user);
            $users[$i + 10]->roles()->save($admin);
            $users[$i + 20]->roles()->save($redactor);
            $users[$i + 30]->roles()->save($moderator);
            $users[$i + 40]->roles()->save($root);
        }
    }
}
