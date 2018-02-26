<?php

use Faker\Generator as Faker;

$factory->define(pfactorio\Release::class, function (Faker $faker) {
    return [
        'download_url' => $faker->url,
        'file_name' => $faker->word.".".$faker->fileExtension,
        'factorio_version' => '0.16',
        'version' => $faker->numberBetween(0,10),
        'released_at' => $faker->dateTime,
        'mod_id' => function(){
            return factory('pfactorio\Mod')->create()->id;
        }
    ];
});
