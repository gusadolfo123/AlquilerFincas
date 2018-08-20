<?php

use Faker\Generator as Faker;

$factory->define(App\Via::class, function (Faker $faker) {
    return [
        'descripcion' => $faker->text(200)
    ];
});
