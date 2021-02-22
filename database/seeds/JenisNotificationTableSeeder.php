<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenisNotificationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Tetap',
                'status' => '1',
            ], [
                'name' => 'Tidak Tetap',
                'status' => '1',
            ]
        ];
        DB::table('jenis_notification')->insert($data);
    }
}
