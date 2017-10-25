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

    return [
        'name'    => $faker->name,
        'slug'    => $faker->slug,
        'content' => $faker->text(1000),
        'image'   => $faker->imageUrl(),
        'category_id' => function () {
            return factory(\App\Model\Category::class)->create()->id;
        },
        'user_id' => function () {
            return factory(\App\Model\User::class)->create()->id;
        }
    ];
});
