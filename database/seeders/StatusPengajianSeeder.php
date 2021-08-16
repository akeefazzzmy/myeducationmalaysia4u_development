<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use DB;

class StatusPengajianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('status_pengajian')->insert(
            [
                ['kod_status' => '01', 'keterangan' => 'Aktif'],
                ['kod_status' => '02', 'keterangan' => 'Tidak Aktif'],
                ['kod_status' => '03', 'keterangan' => 'Berhenti'],
                ['kod_status' => '04', 'keterangan' => 'Gagal Dan Diberhentikan'],
                ['kod_status' => '05', 'keterangan' => 'Meninggal Dunia'],
            ],
        );
    }
}
