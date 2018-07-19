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

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'username' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'provider_id'=> $faker->randomNumber(8),
        'nickname'=> $faker->firstName,
        'avatar'=> $faker->imageUrl(),
    ];
});

$factory->define(App\Document::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'body' => $faker->text(),
    ];
});

$factory->define(App\Lesson::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'body' => $faker->paragraph,
        'views' => $faker->randomNumber(4),
        'length' => $faker->randomNumber(3),
        'difficulty'=> $faker->randomElement(array('beginner','intermediate','advanced'))
    ];
});