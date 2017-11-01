<?php

use Illuminate\Database\Seeder;

/**
 * Class PostsTableSeeder
 */
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\User::class, 50)->create();
    }
}
