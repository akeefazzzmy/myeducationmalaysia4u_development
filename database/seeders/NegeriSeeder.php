<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use DB;

class NegeriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('negeri')->insert(
            [
                ['kod_negeri' => '01', 'keterangan' => 'Johor'],
                ['kod_negeri' => '02', 'keterangan' => 'Kedah'],
                ['kod_negeri' => '03', 'keterangan' => 'Kelantan'],
                ['kod_negeri' => '04', 'keterangan' => 'Melaka'],
                ['kod_negeri' => '05', 'keterangan' => 'Negeri Sembilan'],

                ['kod_negeri' => '06', 'keterangan' => 'Pahang'],
                ['kod_negeri' => '07', 'keterangan' => 'Pulau Pinang'],
                ['kod_negeri' => '08', 'keterangan' => 'Perak'],
                ['kod_negeri' => '09', 'keterangan' => 'Perlis'],
                ['kod_negeri' => '10', 'keterangan' => 'Selangor'],

                ['kod_negeri' => '11', 'keterangan' => 'Terengganu'],
                ['kod_negeri' => '12', 'keterangan' => 'Sabah'],
                ['kod_negeri' => '13', 'keterangan' => 'Sarawak'],
                ['kod_negeri' => '14', 'keterangan' => 'Wilayah Persekutuan (Kuala Lumpur)'],
                ['kod_negeri' => '15', 'keterangan' => 'Wilayah Persekutuan (Labuan)'],

                ['kod_negeri' => '16', 'keterangan' => 'Wilayah Persekutuan (Putrajaya)']
            ],
        );
    }
}
