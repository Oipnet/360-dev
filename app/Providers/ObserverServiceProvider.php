<?php
namespace App\Providers;

use App\Observers\PostImageObserver;
use App\Observers\PostsCountObserver;
use App\Model\Post;
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
        Post::observe(PostImageObserver::class);
    }

    public function register()
    {
    }
}
