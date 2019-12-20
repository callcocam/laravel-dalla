<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(\App\Model\Admin\Addres::class, function (Faker $faker) {
    $name = $faker->name;
    return [
        'company_id' => get_tenant_id(),
        'user_id' => null,
        'uuid' => Str::uuid(),
        'name' => $name,
        'slug' => Str::slug($name),
        'zip' => $faker->postcode,
        'city' => $faker->city,
        'state' => $faker->stateAbbr,
        'street' => $faker->streetAddress,
        'district' => $faker->streetName,
        'number' => $faker->buildingNumber                      ,
        'complement' =>  $faker->secondaryAddress,
        'updated_at' => date("Y-m-d H:i:s"),
        'created_at' => date("Y-m-d H:i:s"),
    ];
});
