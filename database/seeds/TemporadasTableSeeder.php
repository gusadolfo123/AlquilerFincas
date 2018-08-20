<?php

use Illuminate\Database\Seeder;

class TemporadasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Temporada::class, 30)->create();
    }
}
