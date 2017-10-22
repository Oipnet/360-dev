<?php

use App\Model\Category;
use App\Model\Tuto;
use App\Model\User;
use Faker\Generator as Faker;

$factory->define(Tuto::class, function (Faker $faker) {
    return [
        'name'    => $faker->name,
        'slug'    => $faker->unique()->slug,
        'content' => $faker->text(1000),
        'type'    => 'tuto',
        'image'   => $faker->imageUrl(),
        'category_id' => function () {
            return factory(Category::class)->create()->id;
        },
        'user_id' => function () {
            return factory(User::class)->create()->id;
        }
    ];
});
