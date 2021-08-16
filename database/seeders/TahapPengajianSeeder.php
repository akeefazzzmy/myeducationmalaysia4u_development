<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use DB;

class TahapPengajianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('tahap_pengajian')->insert(
            [
                ['kod_tahap' => '01', 'keterangan' => 'Diploma'],
                ['kod_tahap' => '02', 'keterangan' => 'Ijazah Sarjana Muda'],
                ['kod_tahap' => '03', 'keterangan' => 'Ijazah Sarjana'],
                ['kod_tahap' => '04', 'keterangan' => 'Ijazah Kehormat'],
                ['kod_tahap' => '05', 'keterangan' => 'Ijazah Kedoktoran'],
            ],
        );
    }
}
