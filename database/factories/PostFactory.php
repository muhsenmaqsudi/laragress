<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'body' => $faker->text,
        'active' => false,
        'user_id' => factory(\App\User::class)
    ];
});

$factory->state(Post::class, 'active', function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'body' => $faker->text,
        'active' => true,
        'user_id' => factory(\App\User::class)
    ];
});
