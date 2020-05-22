<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Played;
use Faker\Generator as Faker;

$factory->define(Played::class, function (Faker $faker) {

    return [
        'user_id' => $faker->randomDigitNotNull,
        'quiz_id' => $faker->randomDigitNotNull,
        'time' => $faker->word,
        'paid' => $faker->word
    ];
});
