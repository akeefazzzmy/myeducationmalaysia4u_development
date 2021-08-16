<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use DB;
use Faker\Factory as Faker;

class InstitusiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // DB::table('institusi')->insert(
        //     [
        //         ['kod_institusi' => '01', 'keterangan' => 'A University', 'states_id' => '1'],
        //         ['kod_institusi' => '02', 'keterangan' => 'B University', 'states_id' => '2'],
        //         ['kod_institusi' => '03', 'keterangan' => 'C University', 'states_id' => '3'],
        //         ['kod_institusi' => '04', 'keterangan' => 'D University', 'states_id' => '4'],
        //         ['kod_institusi' => '05', 'keterangan' => 'E University', 'states_id' => '5'],
        //     ],
        // );

        // $faker = Faker::create();
        // $faker = \Faker\Factory::create();
        // $faker->addProvider(new \Bezhanov\Faker\Provider\Educator($faker));
    	// foreach (range(1,20) as $index)
        // {
        //     DB::table('institusi')->insert(
        //         [
        //             'kod_institusi' => 'ABC123',
        //             // 'keterangan' => $faker->name." University",
        //             'keterangan' => $faker->university,
        //             // 'no_kp_wujud' => '887892039159' ,
        //             // 'no_kp_kemaskini' => '887892039159',
        //             // 'created_at' => $faker->date($format = 'Y-m-d', $max = 'now'),
        //             // 'updated_at' => $faker->date($format = 'Y-m-d', $max = 'now'),
        //             'states_id' => rand(1, 20)
        //             // 'negara_id' => '2'
        //             // 'liputanEm_id' => rand(1, 100)
        //         ]);
        // }
    }
}
