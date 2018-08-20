<?php

use Illuminate\Database\Seeder;

class FotosFincaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\fotoFinca::class, 30)->create();
    }
}
