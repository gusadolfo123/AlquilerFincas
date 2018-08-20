<?php

use Faker\Generator as Faker;

$factory->define(App\Cliente::class, function (Faker $faker) {
    return [
        'nombre' => $faker->text(60),
        'email' => $faker->text(60),
        'celular' => rand(3000000000, 9999999999)
    ];
});
