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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Budgets\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => 'Administrador del Sistema',
        'email' => 'admin@presupuestando.uts',
        'password' => bcrypt('presupuestando'),
        'genre' => 'hombre',
        'role' => 1,
        'remember_token' => str_random(10),
    ];
});
