<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Result;
use Faker\Generator as Faker;

$factory->define(Result::class, function (Faker $faker) {

    return [
        'winner_id' => $faker->randomDigitNotNull,
        'quiz_id' => $faker->randomDigitNotNull,
        'prize' => $faker->randomDigitNotNull,
        'paid' => $faker->word
    ];
});
