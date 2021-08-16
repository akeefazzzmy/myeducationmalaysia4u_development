<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use DB;

class AgamaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('agama')->insert(
            [
                ['kod_agama' => '01', 'keterangan' => 'Islam'],
                ['kod_agama' => '02', 'keterangan' => 'Hindu'],
                ['kod_agama' => '03', 'keterangan' => 'Buddha'],
                ['kod_agama' => '04', 'keterangan' => 'Nasrani']                    
            ],
        );
    }
}
