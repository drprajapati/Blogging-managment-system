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
        $user = App\User::create([
            'name' => 'Darshan',
            'email' => 'dp.ten@ten.com',
            'password' => bcrypt('dpten10'),
            'admin' => 1
        ]);

        App\Profile::create([
            'user_id' => $user->id,
            'avatar' => 'uploads/avatars/index.png',
            'about' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur at blanditiis distinctio dolore dolorum, enim, et nulla perferendis provident, quam rerum voluptates. Doloribus, illo molestias. Nisi quam recusandae saepe sit.',
            'facebook' => 'facebook.com',
            'youtube' => 'youtube.com'
        ]);
    }
}
