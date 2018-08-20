<?php

use Faker\Generator as Faker;

$factory->define(App\Temporada::class, function (Faker $faker) {
    return [
        'descripcion' => $faker->text(20),
        'fecha' => date("Y-m-d H:i:s")
    ];
});
