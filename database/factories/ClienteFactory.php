<?php

use Faker\Generator as Faker;

$factory->define(App\Cliente::class, function (Faker $faker) {
    return [
        'nombre' => $faker->unique()->name(60),
        'email' => $faker->unique()->email(),
        'telefono1' => $faker->unique()->phoneNumber(),
        'telefono2' => $faker->unique()->phoneNumber()
    ];
});
