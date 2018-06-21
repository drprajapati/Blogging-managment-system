<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Setting::create([
            'site_name'=>"Laravel'\s Blog",
            'contact_number'=>'+91 49881 84494',
            'contact_email'=>'info@laravel.com',
            'address'=>'Gujarat, Banaskantha'
        ]);
    }
}
