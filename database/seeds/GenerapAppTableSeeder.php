<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenerapAppTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('general_app')->insert([
    		'name' => 'Mitra Pedagang',
			'logo_light' => 'frontend/images/logo.png',
			'logo_dark' => 'frontend/images/logo-dark.png',
			'icon' => 'frontend/images/logo.ico',
			'facebook' => '',
			'twitter' => '',
			'instagram' => '',
			'email' => '',
			'address' => 'Bandung'
        ]);
    }
}
