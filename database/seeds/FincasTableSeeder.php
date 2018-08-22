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
        

        //factory(App\Finca::class, 10)->create();
        $fincas = factory(App\Finca::class, 10)->make();
        
        $ciudades = App\Ciudad::all();
        foreach($fincas as $finca)
        {
            $ciudades->random()->fincas()->save($finca);
        }
    }
}
