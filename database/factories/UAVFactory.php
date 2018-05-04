<?php

use Faker\Generator as Faker;

$factory->define(\App\UAV::class, function (Faker $faker) {
    return [
        "uuid" => $faker->uuid
    ];
});