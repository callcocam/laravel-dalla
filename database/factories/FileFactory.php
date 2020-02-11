<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\File::class, function (Faker $faker) {
    return [
        'fullPath'=>$faker->image(storage_path('products'), 640,  480)
    ];
});
