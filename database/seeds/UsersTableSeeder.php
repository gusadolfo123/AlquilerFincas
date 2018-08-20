<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 10)->create();                
        

        /* Admin */
        App\User::create([
            'name' => 'Gusadolfo123',
            'email' => 'Gusadolfo123@hotmail.com',
            'password' => bcrypt('123456')
        ]);
    }
}
