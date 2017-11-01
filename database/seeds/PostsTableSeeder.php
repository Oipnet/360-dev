<?php

use Illuminate\Database\Seeder;

/**
 * Class PostsTableSeeder
 */
class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Category::class, 50)->create();
        factory(\App\Post::class, 50)->create();
    }
}
