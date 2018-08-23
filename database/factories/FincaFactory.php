<?php

use Faker\Generator as Faker;

$factory->define(App\Finca::class, function (Faker $faker) {

    $nom = $faker->unique()->word(20);

    return [
        'nombre' => $nom,
        'descripcion' => $faker->text(500),
        'precio_Tbaja' => rand(50000, 99999),
        'precio_Talta' => rand(50000, 99999),
        'direccion' => $faker->unique()->word(20),
        'cant_habitaciones' => rand(1, 10),
        'cant_banios' => rand(1, 10),
        'max_personas' => rand(10, 20),
        'sn_jacuzi' => $faker->randomElement([true, false]),
        'sn_piscina' => $faker->randomElement([true, false]),
        'slug' => str_slug($nom),
        'via_id' => rand(1, 10),
        'ciudad_id' => rand(1, 10)
    ];
});
