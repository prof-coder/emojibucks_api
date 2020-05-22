<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Quiz;
use Faker\Generator as Faker;

$factory->define(Quiz::class, function (Faker $faker) {

    return [
        'name' => $faker->word,
        'open_time' => $faker->word,
        'close_time' => $faker->word,
        'takings' => $faker->word
    ];
});
