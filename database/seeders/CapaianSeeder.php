<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use DB;

class CapaianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('capaian')->insert(
            [
                ['kod_capaian' => '01', 'keterangan' => 'Admin'],
                ['kod_capaian' => '02', 'keterangan' => 'Pegawai Bahagian Educational Malaysia'],
                ['kod_capaian' => '03', 'keterangan' => 'Pegawai Educational Malaysia'],
                ['kod_capaian' => '04', 'keterangan' => 'Kedutaan'],
                ['kod_capaian' => '05', 'keterangan' => 'Pelajar']                       
            ],
        );
    }
}
