<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use DB;
use Faker\Factory as Faker;

class StatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // DB::table('states')->insert(
        //     [
        //         ['kod_states' => '01', 'keterangan' => 'State A', 'no_kp_wujud' => '887892039159', 'no_kp_kemaskini' => '887892039159', 'negara_id' => '7'],
        //         ['kod_states' => '02', 'keterangan' => 'State B', 'no_kp_wujud' => '887892039159', 'no_kp_kemaskini' => '887892039159', 'negara_id' => '8'],
        //         ['kod_states' => '03', 'keterangan' => 'State C', 'no_kp_wujud' => '887892039159', 'no_kp_kemaskini' => '887892039159', 'negara_id' => '11'],
        //         ['kod_states' => '04', 'keterangan' => 'State D', 'no_kp_wujud' => '887892039159', 'no_kp_kemaskini' => '887892039159', 'negara_id' => '9'],
        //         ['kod_states' => '05', 'keterangan' => 'State E', 'no_kp_wujud' => '887892039159', 'no_kp_kemaskini' => '887892039159', 'negara_id' => '10'],
        //     ],
        // );

        // $faker = Faker::create();
    	// foreach (range(1,20) as $index)
        // {
        //     DB::table('states')->insert(
        //         [
        //             'kod_states' => rand(1, 20),
        //             'keterangan' => $faker->state,
        //             'no_kp_wujud' => '887892039159' ,
        //             'no_kp_kemaskini' => '887892039159',                    
        //             'negara_id' => rand(1, 20)
        //             // 'created_at' => $faker->date($format = 'Y-m-d', $max = 'now'),
        //             // 'updated_at' => $faker->date($format = 'Y-m-d', $max = 'now'),
        //             // 'negara_id' => '2'
        //             // 'liputanEm_id' => rand(1, 100)
        //         ]);
        // }
    }
}
