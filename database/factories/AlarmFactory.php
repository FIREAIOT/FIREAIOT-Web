<?php

use Faker\Generator as Faker;

$factory->define(\App\Alarm::class, function (Faker $faker) {
    return [
        "user_id"   => factory(\App\User::class)->create()->id,
        "latitude"  => $faker->latitude,
        "longitude" => $faker->longitude
    ];
});
