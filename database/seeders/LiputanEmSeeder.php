<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use DB;
use Faker\Factory as Faker;

class LiputanEmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('liputan_em')->insert(
        //     [
        //         ['em_id' => '3', 'negara_id' => '1', 'no_kp_wujud' => '889123456723', 'no_kp_kemaskini' => '889123456723'],
        //         ['em_id' => '3', 'negara_id' => '2', 'no_kp_wujud' => '889123456723', 'no_kp_kemaskini' => '889123456723'],
        //         ['em_id' => '3', 'negara_id' => '3', 'no_kp_wujud' => '889123456723', 'no_kp_kemaskini' => '889123456723'],
        //         ['em_id' => '4', 'negara_id' => '4', 'no_kp_wujud' => '889123456723', 'no_kp_kemaskini' => '889123456723'],
        //         ['em_id' => '5', 'negara_id' => '5', 'no_kp_wujud' => '889123456723', 'no_kp_kemaskini' => '889123456723'],
        //         ['em_id' => '6', 'negara_id' => '6', 'no_kp_wujud' => '889123456723', 'no_kp_kemaskini' => '889123456723'],
        //         ['em_id' => '7', 'negara_id' => '7', 'no_kp_wujud' => '889123456723', 'no_kp_kemaskini' => '889123456723'],
        //         ['em_id' => '8', 'negara_id' => '8', 'no_kp_wujud' => '889123456723', 'no_kp_kemaskini' => '889123456723'],
        //         ['em_id' => '9', 'negara_id' => '9', 'no_kp_wujud' => '889123456723', 'no_kp_kemaskini' => '889123456723'],                
        //         ['em_id' => '10', 'negara_id' => '10', 'no_kp_wujud' => '889123456723', 'no_kp_kemaskini' => '889123456723'],

        //         ['em_id' => '1', 'negara_id' => '11', 'no_kp_wujud' => '889123456723', 'no_kp_kemaskini' => '889123456723'],
        //         ['em_id' => '1', 'negara_id' => '12', 'no_kp_wujud' => '889123456723', 'no_kp_kemaskini' => '889123456723'],
        //         ['em_id' => '1', 'negara_id' => '13', 'no_kp_wujud' => '889123456723', 'no_kp_kemaskini' => '889123456723'],

        //         ['em_id' => '2', 'negara_id' => '14', 'no_kp_wujud' => '889123456723', 'no_kp_kemaskini' => '889123456723'],
        //         ['em_id' => '2', 'negara_id' => '15', 'no_kp_wujud' => '889123456723', 'no_kp_kemaskini' => '889123456723'],
        //         ['em_id' => '2', 'negara_id' => '16', 'no_kp_wujud' => '889123456723', 'no_kp_kemaskini' => '889123456723'],

        //     ],
        // );

        $faker = Faker::create();
    	// foreach (range(1,200) as $index)
        // {
        //     DB::table('liputan_em')->insert(
        //         [
        //             'em_id' => $faker->numerify('##'),
        //             'negara_id' => $faker->numerify('##'),
        //             'no_kp_wujud' => '887892039159' ,
        //             'no_kp_kemaskini' => '887892039159',
        //             'created_at' => $faker->date($format = 'Y-m-d', $max = 'now'),
        //             'updated_at' => $faker->date($format = 'Y-m-d', $max = 'now'),
        //             'negara_id' => $faker->numerify('##')
        //         ]);
        // }

        // foreach (range(1,20) as $index)
        // {
        //     DB::table('liputan_em')->insert(
        //         [
        //             'em_id' => rand(1, 11),
        //             'negara_id' => rand(1, 20),
        //             'no_kp_wujud' => '887892039159' ,
        //             'no_kp_kemaskini' => '887892039159',
        //             'created_at' => $faker->date($format = 'Y-m-d', $max = 'now'),
        //             'updated_at' => $faker->date($format = 'Y-m-d', $max = 'now'),
        //         ]);
        // }

    }
}
