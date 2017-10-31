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
        Role::insert([
            [
                'name' => 'user',
                'display_name' => 'Simple user',
                'description' => 'Just a simple user'
            ], [
                'name' => 'moderator',
                'display_name' => 'Moderator',
                'description' => 'User can moderate comments and forum'
            ], [
                'name' => 'redactor',
                'display_name' => 'Redactor',
                'description' => 'User can write post'
            ], [
                'name' => 'admin',
                'display_name' => 'Admin',
                'description' => 'User can moderate all and can write/edit post'
            ], [
                'name' => 'root',
                'display_name' => 'Super Admin',
                'description' => 'Full access'
            ]
        ]);
    }
}
