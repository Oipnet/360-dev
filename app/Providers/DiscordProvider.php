<?php
namespace App\Providers;

use Illuminate\Foundation\Application;
use Illuminate\Support\ServiceProvider;
use RestCord\DiscordClient;

class DiscordProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(DiscordClient::class, function (Application $app) {
            return new DiscordClient(['token' => config('discord.token')]);
        });
    }
}