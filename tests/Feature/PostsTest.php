<?php
namespace Tests\Feature;

use App\Model\Post;

class PostsTest extends TestWithDbCase
{

    public function testWithEmptyFieldSlug()
    {
        $post  = factory(Post::class)->create(['name' => 'un test', 'slug' => null]);
        $post2 = factory(Post::class)->create(['name' => 'un test', 'slug' => '']);
        $this->assertEquals('un-test', $post->slug);
        $this->assertEquals('un-test', $post2->slug);
    }

    public function testNotEmptySlugField()
    {
        $post  = factory(Post::class)->create(['name' => 'un test', 'slug' => 'un-super-lien']);
        $this->assertEquals('un-super-lien', $post->slug);
    }
}
