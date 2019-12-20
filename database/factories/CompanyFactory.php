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

$factory->define(\App\Model\Admin\Company::class, function (Faker $faker) {
    $name = $faker->name;
    return [
        'company_id' => get_tenant_id(),
        'user_id' => null,
        'uuid' => Str::uuid(),
        'name' => $name,
        'slug' => Str::slug($name),
        'email' => $faker->unique()->safeEmail,
        'phone' => $faker->phoneNumber,
        'document' => $faker->creditCardNumber,
        'description' => $faker->sentence
    ];
});
