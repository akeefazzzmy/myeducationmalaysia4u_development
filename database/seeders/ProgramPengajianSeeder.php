<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use DB;

class ProgramPengajianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // DB::table('program_pengajian')->insert(
        //     [
        //         ['kod_program_pengajian' => '01', 'keterangan' => 'Computer Science', 'tahap_pengajian_id' => '1', 'institusi_id' => '1', 'bidang_id'=>'1'],
        //         ['kod_program_pengajian' => '02', 'keterangan' => 'Law', 'tahap_pengajian_id' => '2', 'institusi_id' => '2', 'bidang_id'=>'1'],
        //         ['kod_program_pengajian' => '03', 'keterangan' => 'Medic', 'tahap_pengajian_id' => '3', 'institusi_id' => '3', 'bidang_id'=>'1'],
        //         ['kod_program_pengajian' => '04', 'keterangan' => 'Engineering', 'tahap_pengajian_id' => '4', 'institusi_id' => '4', 'bidang_id'=>'1'],
        //         ['kod_program_pengajian' => '05', 'keterangan' => 'Psychology', 'tahap_pengajian_id' => '5', 'institusi_id' => '5', 'bidang_id'=>'1'],
        //     ],
        // );

        // $faker = \Faker\Factory::create();
        // $faker->addProvider(new \Bezhanov\Faker\Provider\Educator($faker));
    	
        // foreach (range(1,20) as $index)
        // {
        //     DB::table('program_pengajian')->insert(
        //         [
        //             'kod_program_pengajian' => 'ABC123',
        //             'keterangan' => $faker->course,
        //             'bidang_id'=> rand(1, 10),

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
