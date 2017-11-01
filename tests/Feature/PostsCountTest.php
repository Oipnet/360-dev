<?php

namespace Tests\Feature;

use App\Post;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class PostsCountTest extends TestCase
{

    public function setUp()
    {
        parent::setUp();
        Artisan::all('migrate');
    }

    public function testCreatePosts()
    {
        Post::create(['name' => 'test', 'slug' => 'test', 'content' => 'aza']);
        $this->assertEquals(1, Post::count());
    }

}
