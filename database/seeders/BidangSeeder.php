<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use DB;
use Faker\Factory as Faker;

class BidangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // DB::table('bidang')->insert(
        //     [
        //         ['kod_bidang'=>'311', 'nama_bidang'=>'PSYCHOLOGY', 'narrow_field'=>'31 SOCIAL AND BEHAVIOURAL SCIENCE', 'broad_field'=>'3 SOCIAL SCIENCES, BUSINESS AND LAW'],
        //         ['kod_bidang'=>'343', 'nama_bidang'=>'FINANCE, BANKING, INSURANCE', 'narrow_field'=>'34 BUSINESS AND ADMINISTRATION', 'broad_field'=>'3 SOCIAL SCIENCES, BUSINESS AND LAW'],
        //         ['kod_bidang'=>'380', 'nama_bidang'=>'LAW', 'narrow_field'=>'38 LAW', 'broad_field'=>'3 SOCIAL SCIENCES, BUSINESS AND LAW'],
        //         ['kod_bidang'=>'481', 'nama_bidang'=>'COMPUTER SCIENCE', 'narrow_field'=>'48 COMPUTING', 'broad_field'=>'4 SCIENCE, MATHEMATICS AND COMPUTING'],
        //         ['kod_bidang'=>'727', 'nama_bidang'=>'PHARMACY', 'narrow_field'=>'72 HEALTH', 'broad_field'=>'7 HEALTH AND WELFARE'],
        //     ],
        // );

        // $faker = Faker::create();
        // $faker = \Faker\Factory::create();
        // $faker->addProvider(new \Bezhanov\Faker\Provider\Educator($faker));    	
        // foreach (range(1,20) as $index)
        // {
        //     DB::table('bidang')->insert(
        //         [
        //             'kod_bidang' => 'ABC123',
        //             'nama_bidang' => $faker->course,
        //             'narrow_field'=> $faker->sentence,
        //             'broad_field'=> $faker->sentence,

        //             // 'no_kp_wujud' => '887892039159' ,
        //             // 'no_kp_kemaskini' => '887892039159',
        //             // 'created_at' => $faker->date($format = 'Y-m-d', $max = 'now'),
        //             // 'updated_at' => $faker->date($format = 'Y-m-d', $max = 'now'),
        //             // 'states_id' => rand(1, 20)
        //             // 'negara_id' => '2'
        //             // 'liputanEm_id' => rand(1, 100)
        //         ]);
        // }
    }
}