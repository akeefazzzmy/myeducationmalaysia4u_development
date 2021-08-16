<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use DB;

class JantinaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('jantina')->insert(
            [
                ['kod_jantina' => '01', 'keterangan' => 'Lelaki'],
                ['kod_jantina' => '02', 'keterangan' => 'Perempuan']                  
            ],
        );
    }
}
