<?php

use Faker\Generator as Faker;

$factory->define(App\Reserva::class, function (Faker $faker) {

    $startingDate = $faker->dateTimeBetween('this week', '+6 days');
    $endingDate   = $faker->dateTimeBetween($startingDate, strtotime('+6 days'));

    return [
        'finca_id' => rand(1,10),
        'cliente_id' => rand(1,10),
        'fec_Reserva' => date('Y-m-d H:i:s'),
        'fec_Ingreso' => $startingDate,
        'fec_Salida' => $endingDate,
        'preCotizacion' => rand(50000, 180000),
        'requerimientos' => $faker->text(500),
        'cant_huespedes' => rand(1,10),
        'estado' => $faker->randomElement(['VERIFICACION', 'CONFIRMADO'])
    ];
});
