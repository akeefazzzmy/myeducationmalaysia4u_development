<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class EmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('em')->insert(
            [
                ['kod_em' => 'EMA', 'keterangan' => 'EM Australia', 'kod_negara_em' => 'AUS', 'alamat' => '67, Victoria Road, Bellevue Hill NSW 2023 Australia'],
                ['kod_em' => 'EMB', 'keterangan' => 'EM Beijing', 'kod_negara_em' => 'CHN', 'alamat' => 'Embassy of Malaysia, Education Section No. 2, Liang Ma Qiao Bei Jie Chaoyang District, People Republic of China'],
                ['kod_em' => 'EMD', 'keterangan' => 'EM Dubai', 'kod_negara_em' => 'ARE', 'alamat' => 'Consulate General of Malaysia Villa 83 Street 10D, Mankhool P.O Box 114140, Dubai, United Arab Emirates'],
                ['kod_em' => 'EMI', 'keterangan' => 'EM Indonesia', 'kod_negara_em' => 'IDN', 'alamat' => 'Kedutaan Besar Malaysia, JIn. H. R. Rasuna Said, Kav. X/6 No. 1-3, 12950 Jakarta, Indonesia'],
                ['kod_em' => 'EMJ', 'keterangan' => 'EM Jordan', 'kod_negara_em' => 'JOR', 'alamat' => 'Embassy of Malaysia No. 5 Tayseer Nanaah Street of Astana Street Abdoun, P.O Box 5351 Amman 11183 Hashemite Kingdom of Jordan'],
                ['kod_em' => 'EML', 'keterangan' => 'EM London', 'kod_negara_em' => 'GBR', 'alamat' => 'High Commission of Malaysia, 30-34 Queensborough Terrace, London W2 3ST'],
                ['kod_em' => 'EMM', 'keterangan' => 'EM Mesir', 'kod_negara_em' => 'EGY', 'alamat' => 'Dewan Malaysia Abbasiah Kaherah (DMAK), 26, Sabil Alkhazender St, From Abdou Basha Square, Abbasiah, Cairo, Arab Republic of Egypt'],
                ['kod_em' => 'EMW', 'keterangan' => 'EM Washington', 'kod_negara_em' => 'USA', 'alamat' => '3516 International Court, NW Washington DC 20008, Amerika Syarikat'],
                ['kod_em' => 'EMC', 'keterangan' => 'EM Chicago', 'kod_negara_em' => 'USA', 'alamat' => '820, Davis Street, Suite 510, Evanston, IL 60201, Illinois United States of America'],
                ['kod_em' => 'EMLA', 'keterangan' => 'EM Los Angeles', 'kod_negara_em' => 'USA', 'alamat' => 'Consulate General Malaysia Los Angeles, 6th Floor, 777 Tower South Figueroa Street, Suite 600, Los Angeles 90017, California, United States of America'],
                ['kod_em' => 'EMV', 'keterangan' => 'EM Ho Chi Minh City', 'kod_negara_em' => 'VIE', 'alamat' => '20, Tu Xuong Street, Ward 7, District 3, 008428 Ho Chi Minh City, Vietnam'],                   
            ],
        );

        // // $kod_negara.'01';
        // $faker = Faker::create();
        // // $kod_em = 'EM'.strtoupper($faker->randomLetter);
    	// foreach (range(1,100) as $index)
        // {
        //     DB::table('em')->insert(
        //         [
        //             'kod_em' => 'EM'.strtoupper($faker->randomLetter), 
        //             'keterangan' => $faker->country,
        //             'kod_negara_em' => strtoupper(Str::random(3))
        //         ]);
        // }

    }
}
