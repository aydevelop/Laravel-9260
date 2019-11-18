<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Post::class, function (Faker\Generator $faker) {
    $title = $faker->realText(20);
    $slug = str_slug($title,'-');
    $user_id = factory(App\User::class)->create()->id;

    return [
        'user_id' => $user_id,
        'title' => $title,
        'slug' => $slug,
        'image' => $faker->imageUrl(600,300, 'technics'),
        'content' => $faker->paragraphs(10,true),
        'premium' => rand(0,1)
    ];
});