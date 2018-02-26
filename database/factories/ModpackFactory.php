<?php

use Faker\Generator as Faker;

$factory->define(pfactorio\Modpack::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'version' => $faker->numberBetween(1, 10),
        'server_id' => function(){
            return factory('pfactorio\Server')->create()->id;
        }
    ];
});