<?php

use App\Model\Post;
use Illuminate\Database\Seeder;

/**
 * Class PostsTableSeeder
 */
class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Post::class, 50)->create();
    }
}
