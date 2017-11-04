<?php

namespace Tests\Feature;

use App\Post;

class PostsCountTest extends TestWithDbCase
{

    public function testCreatePosts()
    {
        $post = factory(Post::class)->create();
        $this->assertEquals(1, $post->count());
    }
}
