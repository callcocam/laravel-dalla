<?php


/** @var \Illuminate\Database\Eloquent\Factory $factory */


use Faker\Generator as Faker;
use Illuminate\Support\Str;

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

$factory->define(\App\User::class, function (Faker $faker) {
    $name = $faker->name;
    return [
        'name' => "Super Admin",
        'slug' => Str::slug("Super Admin"),
        'email' => sprintf("supera-admin@%s", request()->getHost()),
        'phone' => $faker->phoneNumber,
        'document' => $faker->creditCardNumber,
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'is_admin' => true,
        'remember_token' => Str::random(10),
        'description' => $faker->sentence
    ];
});
