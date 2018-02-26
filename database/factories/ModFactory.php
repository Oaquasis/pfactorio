<?php

use Faker\Generator as Faker;

$factory->define(pfactorio\Mod::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'title' => $faker->sentence,
        'owner' => $faker->name,
        'summary' => $faker->text,
        'downloads_count' => $faker->numberBetween(0, 50000)
    ];
});