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

$factory->define(App\Author::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
    ];
});

$factory->define(App\Genre::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->randomElement(['Adventure', 'Detective', 'Thriller', 'Fantasy', 'Romance', 'Teens']),
        'description' => $faker->sentence
    ];
});

$factory->define(App\Book::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->name,
        'description' => $faker->paragraph(5, true),
        'release_date' => $faker->date('Y-m-d', 'now'),
        'price' => $faker->randomFloat(2, 0.0, 100.00),
        'created_by' => 1,
        'updated_by' => 1,
    ];
});
