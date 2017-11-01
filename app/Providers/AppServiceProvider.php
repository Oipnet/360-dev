<?php

namespace App\Providers;

use App\Observers\PostsCountObserver;
use App\Post;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Barryvdh\Debugbar;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Fix bug "Specified key was too long error"
        Schema::defaultStringLength(191);
        if (env('APP_DEBUG')) {
            $this->register(Debugbar\ServiceProvider::class);
        }
        // Add obersations class
        Post::observe(PostsCountObserver::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
