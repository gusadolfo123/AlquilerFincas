<?php

use Illuminate\Database\Seeder;

class ViasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Via::class, 6)->create();
    }
}
