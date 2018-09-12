<?php

use Faker\Generator as Faker;

$factory->define(App\Finca::class, function (Faker $faker) {

    $nom = $faker->unique()->company();

    return [
        'nombre' => $nom,
        'descripcion' => $faker->text(500),
        'precio_Tbaja' => $faker->numberBetween($min = 60000, $max = 90000),
        'precio_Tmedia' => $faker->numberBetween($min = 95000, $max = 140000),
        'precio_Talta' => $faker->numberBetween($min = 145000, $max = 200000),
        'direccion' => $faker->unique()->address(),
        'cant_habitaciones' => rand(1, 10),
        'cant_banios' => rand(1, 10),
        'max_personas' => rand(10, 20),
        'sn_jacuzi' => $faker->randomElement([true, false]),
        'sn_piscina' => $faker->randomElement([true, false]),
        'sn_caballos' => $faker->randomElement([true, false]),
        'sn_parqueadero' => $faker->randomElement([true, false]),
        'sn_picnic' => $faker->randomElement([true, false]),        
        'slug' => str_slug($nom),
        'via_id' => rand(1, 10),
        'departamento_id' => rand(1, 10)
    ];
});
