<?php

use App\Republic;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Republic::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'address' => $faker->address,
        'rental_per_month' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 300, $max = 10000),
        'footage' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 500),
        'user_id' => factory('App\User')->create()->id,
        'number_bath' => $faker->randomDigit,
        'number_bed' => $faker->randomDigit,
        'parking' => $faker->boolean,
        'animals' => $faker->boolean,
        'description' => $faker->realText($maxNbChars = 200, $indexSize = 2),
    ];
});
