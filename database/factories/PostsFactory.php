<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Model\Post::class, function (Faker $faker) {

	$role     = \App\Model\User::inRandomOrder()->first();
	$category = \App\Model\Category::inRandomOrder()->first();

    return [
        'name'        => $faker->name,
        'slug'        => $faker->slug,
        'content'     => $faker->text(1000),
        'image'       => null, //$faker->image(public_path('posts')),
        'online'      => false,
        'category_id' => rand(1, 10),
        'user_id'     => rand(1, 10),
    ];
});
