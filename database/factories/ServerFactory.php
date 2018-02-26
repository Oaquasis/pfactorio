<?php

use Faker\Generator as Faker;

$factory->define(pfactorio\Server::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'dns_name' => $faker->domainWord.$faker->domainName,
        'ip_address' => $faker->ipv4,
        'port' => $faker->numberBetween(2000, 65542),
        'version' => $faker->numberBetween(1,10),
        'status' => $faker->boolean
    ];
});
