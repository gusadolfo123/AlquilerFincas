<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);        
        $this->call(DepartamentosTableSeeder::class);
        $this->call(ViasTableSeeder::class);
        $this->call(TemporadasTableSeeder::class);
        $this->call(ClientesTableSeeder::class);
        $this->call(FincasTableSeeder::class);
        $this->call(ReservasTableSeeder::class);
        $this->call(FotosFincaTableSeeder::class);
    }
}
