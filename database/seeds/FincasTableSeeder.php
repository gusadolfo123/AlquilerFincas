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
        $fincas = factory(App\Finca::class, 50)->make();
        
        $depatamentos = App\Departamento::all();
        $vias = App\Via::all();

        foreach($fincas as $finca)
        {
            $depatamentos->random()->fincas()->save($finca);
            $vias->random()->fincas()->save($finca);
        }
    }
}
