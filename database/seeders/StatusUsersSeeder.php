<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use DB;

class StatusUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('status_users')->insert(
            [
                ['kod_status' => '01', 'keterangan' => 'Aktif'],
                ['kod_status' => '02', 'keterangan' => 'Tidak Aktif'],
            ],
        );
    }
}
