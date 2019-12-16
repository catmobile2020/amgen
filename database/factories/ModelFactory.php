<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

$factory->define(App\Team::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
    ];
});

$factory->define(App\Category::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
    ];
});

$factory->define(App\Set::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'type' => $faker->title,
        'level' => $faker->numberBetween(0,5),
        'category_id' => $faker->numberBetween(1,9),
    ];
});

$factory->define(App\Question::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->sentence,
        'score' => $faker->numberBetween(0,100),
    ];
});

$factory->define(App\Answer::class, function (Faker\Generator $faker) {
    return [
        'answer' => $faker->word,
        'is_right' => $faker->boolean,
    ];
});