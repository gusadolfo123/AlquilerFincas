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
        //factory(App\fotoFinca::class, 30)->create();
        $fotos = factory(App\fotoFinca::class, 30)->make();
        
        $fincas = App\Finca::all();
        foreach($fotos as $foto)
        {
            $fincas->random()->fotos()->save($foto);
        }
    }
}
