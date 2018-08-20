<?php

use Faker\Generator as Faker;

$factory->define(App\Reserva::class, function (Faker $faker) {

    $startingDate = $faker->dateTimeBetween('this week', '+6 days');
    $endingDate   = $faker->dateTimeBetween($startingDate, strtotime('+6 days'));

    return [
        'id_finca' => rand(1,10),
        'id_cliente' => rand(1,10),
        'fec_Reserva' => date('Y-m-d H:i:s'),
        'fec_Ingreso' => $startingDate,
        'fec_Salida' => $endingDate,
        'preCotizacion' => rand(50000, 50000),
        'requerimientos' => $faker->text(500),
        'cant_Menores' => rand(1,10),
        'cant_Adultos' => rand(1,10),
        'estado' => $faker->randomElement(['VERIFICACION', 'CONFIRMADO'])
    ];
});
