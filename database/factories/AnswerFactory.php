<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Answer;
use Faker\Generator as Faker;

$factory->define(Answer::class, function (Faker $faker) {

    return [
        'user_id' => $faker->randomDigitNotNull,
        'quiz_id' => $faker->randomDigitNotNull,
        'question_id' => $faker->randomDigitNotNull,
        'answer' => $faker->text,
        'time' => $faker->word
    ];
});
