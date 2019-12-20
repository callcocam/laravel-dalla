<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(\App\Suports\Shinobi\Models\Role::class, function (Faker $faker) {
    return [
        'company_id' => get_tenant_id(),
        'user_id' => null,
        'uuid' => Str::uuid()
    ];
});
