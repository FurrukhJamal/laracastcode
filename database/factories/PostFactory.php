<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        "slug" => $faker->word,
        "description" => $faker->paragraph,
        "title" => $faker->sentence,
        "user_id" => factory(\App\User::class), //use to user factory ..create a user and assign that id
    ];
});
