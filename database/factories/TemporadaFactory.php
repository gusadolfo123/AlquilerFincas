<?php

use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(App\Temporada::class, function (Faker $faker) {
    
    $year = rand(2018, 2018);
    $month = rand(8, 12);
    $day = rand(1, 28);

    $date = Carbon::create($year,$month ,$day , 0, 0, 0);
    
    return [
        'descripcion' => $faker->text(20),
        'fecha' => $date
    ];
});
