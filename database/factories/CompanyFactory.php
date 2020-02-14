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

$factory->define(\App\Company::class, function (Faker $faker) {
    $name = $faker->name;
    $uuid = \Ramsey\Uuid\Uuid::uuid4()->toString();
    \App\Tenant\Facades\Tenant::addTenant('company_id',$uuid);
    return [
        'id' => $uuid,
        'name' => $name,
        'assets' => env('APP_URL','localhost.maks.test'),
        'slug' => Str::slug($name),
        'email' => $faker->unique()->safeEmail,
        'phone' => $faker->phoneNumber,
        'document' => $faker->creditCardNumber,
        'description' => $faker->sentence
    ];
});
