<?php

use App\Model\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            [
                'name'         => 'user',
                'slug'         => 'Simple user',
                'description'  => 'Just a simple user'
            ], [
                'name'         => 'moderator',
                'slug'         => 'Moderator',
                'description'  => 'User can moderate comments and forum'
            ], [
                'name'         => 'admin',
                'slug'         => 'Admin',
                'description'  => 'User can moderate all and can write/edit post'
            ]
        ]);
    }
}
