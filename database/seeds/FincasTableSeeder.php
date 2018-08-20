<?php

use Illuminate\Database\Seeder;

class FincasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         factory(App\Finca::class, 10)->create();
    }
}
