<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use DB;

class HubunganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('hubungan')->insert(
            [
                ['kod_hubungan' => '01', 'keterangan' => 'Abang'],
                ['kod_hubungan' => '02', 'keterangan' => 'Adik'],
                ['kod_hubungan' => '03', 'keterangan' => 'Anak'],
                ['kod_hubungan' => '04', 'keterangan' => 'Bapa'],                
                ['kod_hubungan' => '05', 'keterangan' => 'Bapa Mertua'],
                ['kod_hubungan' => '06', 'keterangan' => 'Bapa Saudara'],
                ['kod_hubungan' => '07', 'keterangan' => 'Datuk'],
                ['kod_hubungan' => '08', 'keterangan' => 'Ibu'],
                ['kod_hubungan' => '09', 'keterangan' => 'Ibu Mertua'],
                ['kod_hubungan' => '10', 'keterangan' => 'Ibu Saudara'],
                ['kod_hubungan' => '11', 'keterangan' => 'Isteri'],
                ['kod_hubungan' => '12', 'keterangan' => 'Kakak'],
                ['kod_hubungan' => '13', 'keterangan' => 'Nenek'],
                ['kod_hubungan' => '14', 'keterangan' => 'Penjaga'],
                ['kod_hubungan' => '15', 'keterangan' => 'Rakan'],
                ['kod_hubungan' => '16', 'keterangan' => 'Saudara'],
                ['kod_hubungan' => '17', 'keterangan' => 'Suami']
            ],
        );
    }
}
