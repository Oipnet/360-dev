<?php
namespace App\Providers;

use App\Observers\PostsCountObserver;
use App\Post;
use Illuminate\Support\ServiceProvider;

/**
 * Class ObserverServiceProvider
 */
class ObserverServiceProvider extends ServiceProvider
{


    public function boot()
    {
        // Add obersations class
        Post::observe(PostsCountObserver::class);
    }

    public function register()
    {
    }
}
