<?php

use Faker\Generator as Faker;

$factory->define(App\Ciudad::class, function (Faker $faker) {
    return [
        'descripcion' => $faker->unique()->word(20)
    ];
});
