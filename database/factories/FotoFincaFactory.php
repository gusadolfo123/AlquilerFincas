<?php

use Faker\Generator as Faker;

$factory->define(App\fotoFinca::class, function (Faker $faker) {
    return [
        'archivo' => $faker->imageUrl($width = 1200, $height = 400),
        'finca_id' => rand(1,10)
    ];
});
