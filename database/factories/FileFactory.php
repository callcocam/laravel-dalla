<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Model\Admin\File::class, function (Faker $faker) {
    return [
        'fullPath'=>$faker->imageUrl(1024, 1024)
    ];
});
