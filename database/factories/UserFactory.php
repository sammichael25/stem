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
    static $password;

    return [
        'fname' => 'Michael',
        'fname' => 'Sam',
        'email' => 'michael@sacodaserv.com',
        'password' => $password ?: $password = bcrypt('sacoda2009'),
        'remember_token' => str_random(10),
    ];
});
