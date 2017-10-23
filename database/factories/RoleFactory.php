<?php

use App\Model\Role;
use Faker\Generator as Faker;

$factory->define(Role::class, function (Faker $faker) {
    return [
        'name' => rand(0,1) ? 'user' : 'moderator'
    ];
});
