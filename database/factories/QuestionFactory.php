<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Question;
use Faker\Generator as Faker;

$factory->define(Question::class, function (Faker $faker) {

    return [
        'num' => $faker->randomDigitNotNull,
        'question' => $faker->text,
        'answer' => $faker->text,
        'search_terms' => $faker->text
    ];
});
