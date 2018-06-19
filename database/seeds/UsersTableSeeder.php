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
        App\User::create([
            'name'=>'Darshan',
            'email'=>'dp.ten@ten.com',
            'password'=>bcrypt('dpten10')
        ]);
    }
}
