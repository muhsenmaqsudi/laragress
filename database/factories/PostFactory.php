<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'body' => $faker->text,
        'active' => false
    ];
});

$factory->state(Post::class, 'active', function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'body' => $faker->text,
        'active' => true
    ];
});
