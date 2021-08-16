<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use DB;

class BangsaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('bangsa')->insert(
            [
                ['kod_bangsa' => '01', 'keterangan' => 'Melayu'],
                ['kod_bangsa' => '02', 'keterangan' => 'India'],
                ['kod_bangsa' => '03', 'keterangan' => 'Cina'],
                ['kod_bangsa' => '04', 'keterangan' => 'Iban'] ,
                ['kod_bangsa' => '05', 'keterangan' => 'Kadazandusun'],
                ['kod_bangsa' => '06', 'keterangan' => 'Murut'],
                ['kod_bangsa' => '07', 'keterangan' => 'Bajau'],
                ['kod_bangsa' => '08', 'keterangan' => 'Punjabi'],
                ['kod_bangsa' => '09', 'keterangan' => 'Serani']  
            ],
        );
    }
}
