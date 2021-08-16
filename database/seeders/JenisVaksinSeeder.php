<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use DB;

class JenisVaksinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('jenis_vaksin')->insert(
            [
                ['nama_vaksin' => 'Astrazeneca'],
                ['nama_vaksin' => 'Sinovac']
            ]
        );
    }
}
