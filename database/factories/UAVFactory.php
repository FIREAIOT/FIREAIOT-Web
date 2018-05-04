<?php

use Faker\Generator as Faker;

$factory->define(\App\UAV::class, function (Faker $faker) {
    return [
        "uuid"           => $faker->uuid,
        "battery"        => $faker->numberBetween(10, 100),
        "isReady"        => $faker->boolean(50),
        "latitude"       => $faker->latitude,
        "longitude"      => $faker->longitude,
        "altitude"       => $faker->numberBetween(10, 50),
        "home_latitude"  => $faker->latitude,
        "home_longitude" => $faker->longitude,
    ];
});