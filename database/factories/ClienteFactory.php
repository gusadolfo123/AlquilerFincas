<?php

use Faker\Generator as Faker;

$factory->define(App\Cliente::class, function (Faker $faker) {
    return [
        'nombre' => $faker->unique()->name(60),
        'email' => $faker->unique()->email(),
        'celular' => $faker->unique()->phoneNumber()
    ];
});
