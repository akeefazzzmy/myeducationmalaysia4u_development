<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use DB;
use Faker\Factory as Faker;

class NegaraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // DB::table('negara')->insert(
        //     [
        //         ['kod_negara' => 'ZZZ', 'keterangan' => 'LAIN-LAIN', 'no_kp_wujud' => '887892039159', 'no_kp_kemaskini' => '887892039159', 'created_at' => '2021-06-14 23:48:07', 'updated_at' => '2021-06-14 23:48:07'],
        //         ['kod_negara' => 'AFG', 'keterangan' => 'AFGANISTAN', 'no_kp_wujud' => '887892039159', 'no_kp_kemaskini' => '887892039159', 'created_at' => '2021-06-14 23:48:07', 'updated_at' => '2021-06-14 23:48:07'],
        //         ['kod_negara' => 'ZAF', 'keterangan' => 'SOUTH AFRIKA Africa', 'no_kp_wujud' => '887892039159', 'no_kp_kemaskini' => '887892039159', 'created_at' => '2021-06-14 23:48:07', 'updated_at' => '2021-06-14 23:48:07'],
        //         ['kod_negara' => 'ALB', 'keterangan' => 'ALBANIA', 'no_kp_wujud' => '887892039159', 'no_kp_kemaskini' => '887892039159' , 'created_at' => '2021-06-14 23:48:07', 'updated_at' => '2021-06-14 23:48:07'],
        //         ['kod_negara' => 'DZA', 'keterangan' => 'ALGERIA', 'no_kp_wujud' => '887892039159', 'no_kp_kemaskini' => '887892039159' , 'created_at' => '2021-06-14 23:48:07', 'updated_at' => '2021-06-14 23:48:07'],
        //         ['kod_negara' => 'ASM', 'keterangan' => 'AMERICAN SAMOA', 'no_kp_wujud' => '887892039159', 'no_kp_kemaskini' => '887892039159' , 'created_at' => '2021-06-14 23:48:07', 'updated_at' => '2021-06-14 23:48:07'],
        //         ['kod_negara' => 'and', 'keterangan' => 'ANDORRA', 'no_kp_wujud' => '887892039159', 'no_kp_kemaskini' => '887892039159' , 'created_at' => '2021-06-14 23:48:07', 'updated_at' => '2021-06-14 23:48:07'],
        //         ['kod_negara' => 'AGO', 'keterangan' => 'Angola', 'no_kp_wujud' => '887892039159', 'no_kp_kemaskini' => '887892039159' , 'created_at' => '2021-06-14 23:48:07', 'updated_at' => '2021-06-14 23:48:07'],
        //         ['kod_negara' => 'AIA', 'keterangan' => 'Anguilla', 'no_kp_wujud' => '887892039159', 'no_kp_kemaskini' => '887892039159' , 'created_at' => '2021-06-14 23:48:07', 'updated_at' => '2021-06-14 23:48:07'],
        //         ['kod_negara' => 'ATA', 'keterangan' => 'Antartica', 'no_kp_wujud' => '887892039159', 'no_kp_kemaskini' => '887892039159' , 'created_at' => '2021-06-14 23:48:07', 'updated_at' => '2021-06-14 23:48:07'],
        //         ['kod_negara' => 'ATG', 'keterangan' => 'Antigua & Barbuda', 'no_kp_wujud' => '887892039159', 'no_kp_kemaskini' => '887892039159' , 'created_at' => '2021-06-14 23:48:07', 'updated_at' => '2021-06-14 23:48:07'],

        //         ['kod_negara' => 'SAU', 'keterangan' => 'SAUDI ARABIA', 'no_kp_wujud' => '887892039159', 'no_kp_kemaskini' => '887892039159', 'created_at' => '2021-06-14 23:48:07', 'updated_at' => '2021-06-14 23:48:07'],
        //         ['kod_negara' => 'ARG', 'keterangan' => 'ARGENTINA', 'no_kp_wujud' => '887892039159', 'no_kp_kemaskini' => '887892039159', 'created_at' => '2021-06-14 23:48:07', 'updated_at' => '2021-06-14 23:48:07'],
        //         ['kod_negara' => 'ARM', 'keterangan' => 'ARMENIA', 'no_kp_wujud' => '887892039159', 'no_kp_kemaskini' => '887892039159', 'created_at' => '2021-06-14 23:48:07', 'updated_at' => '2021-06-14 23:48:07'],
        //         ['kod_negara' => 'ABW', 'keterangan' => 'ARUBA', 'no_kp_wujud' => '887892039159', 'no_kp_kemaskini' => '887892039159' , 'created_at' => '2021-06-14 23:48:07', 'updated_at' => '2021-06-14 23:48:07'],
        //         ['kod_negara' => 'AUS', 'keterangan' => 'AUSTRALIA', 'no_kp_wujud' => '887892039159', 'no_kp_kemaskini' => '887892039159' , 'created_at' => '2021-06-14 23:48:07', 'updated_at' => '2021-06-14 23:48:07'],
        //         ['kod_negara' => 'AUT', 'keterangan' => 'AUSTRIA', 'no_kp_wujud' => '887892039159', 'no_kp_kemaskini' => '887892039159' , 'created_at' => '2021-06-14 23:48:07', 'updated_at' => '2021-06-14 23:48:07'],
        //         ['kod_negara' => 'AZE', 'keterangan' => 'AZERBAIJAN', 'no_kp_wujud' => '887892039159', 'no_kp_kemaskini' => '887892039159' , 'created_at' => '2021-06-14 23:48:07', 'updated_at' => '2021-06-14 23:48:07'],
        //         ['kod_negara' => 'BHS', 'keterangan' => 'BAHAMAS', 'no_kp_wujud' => '887892039159', 'no_kp_kemaskini' => '887892039159' , 'created_at' => '2021-06-14 23:48:07', 'updated_at' => '2021-06-14 23:48:07'],
        //         ['kod_negara' => 'BHR', 'keterangan' => 'BAHRAIN', 'no_kp_wujud' => '887892039159', 'no_kp_kemaskini' => '887892039159' , 'created_at' => '2021-06-14 23:48:07', 'updated_at' => '2021-06-14 23:48:07'],
        //         ['kod_negara' => 'BGD', 'keterangan' => 'BANGLADESH', 'no_kp_wujud' => '887892039159', 'no_kp_kemaskini' => '887892039159' , 'created_at' => '2021-06-14 23:48:07', 'updated_at' => '2021-06-14 23:48:07'],
        //         ['kod_negara' => 'BRB', 'keterangan' => 'BARBADOS', 'no_kp_wujud' => '887892039159', 'no_kp_kemaskini' => '887892039159' , 'created_at' => '2021-06-14 23:48:07', 'updated_at' => '2021-06-14 23:48:07'],

        //         //
        //         ['kod_negara' => 'BLR', 'keterangan' => 'BELARUS', 'no_kp_wujud' => '887892039159', 'no_kp_kemaskini' => '887892039159', 'created_at' => '2021-06-14 23:48:07', 'updated_at' => '2021-06-14 23:48:07'],
        //         ['kod_negara' => 'BEL', 'keterangan' => 'BELGIUM', 'no_kp_wujud' => '887892039159', 'no_kp_kemaskini' => '887892039159', 'created_at' => '2021-06-14 23:48:07', 'updated_at' => '2021-06-14 23:48:07'],
        //         ['kod_negara' => 'BLZ', 'keterangan' => 'BELIZE', 'no_kp_wujud' => '887892039159', 'no_kp_kemaskini' => '887892039159', 'created_at' => '2021-06-14 23:48:07', 'updated_at' => '2021-06-14 23:48:07'],
        //         ['kod_negara' => 'BEN', 'keterangan' => 'BENIN', 'no_kp_wujud' => '887892039159', 'no_kp_kemaskini' => '887892039159' , 'created_at' => '2021-06-14 23:48:07', 'updated_at' => '2021-06-14 23:48:07'],
        //         ['kod_negara' => 'BMU', 'keterangan' => 'BERMUDA', 'no_kp_wujud' => '887892039159', 'no_kp_kemaskini' => '887892039159' , 'created_at' => '2021-06-14 23:48:07', 'updated_at' => '2021-06-14 23:48:07'],
        //         ['kod_negara' => 'BTN', 'keterangan' => 'BHUTAN', 'no_kp_wujud' => '887892039159', 'no_kp_kemaskini' => '887892039159' , 'created_at' => '2021-06-14 23:48:07', 'updated_at' => '2021-06-14 23:48:07'],
        //         ['kod_negara' => 'BOL', 'keterangan' => 'BOLIVIA', 'no_kp_wujud' => '887892039159', 'no_kp_kemaskini' => '887892039159' , 'created_at' => '2021-06-14 23:48:07', 'updated_at' => '2021-06-14 23:48:07'],
        //         ['kod_negara' => 'BIH', 'keterangan' => 'BOSNIA & HERZEGOVINA', 'no_kp_wujud' => '887892039159', 'no_kp_kemaskini' => '887892039159' , 'created_at' => '2021-06-14 23:48:07', 'updated_at' => '2021-06-14 23:48:07'],
        //         ['kod_negara' => 'BWA', 'keterangan' => 'BOTSWANA', 'no_kp_wujud' => '887892039159', 'no_kp_kemaskini' => '887892039159' , 'created_at' => '2021-06-14 23:48:07', 'updated_at' => '2021-06-14 23:48:07'],
        //         ['kod_negara' => 'BVT', 'keterangan' => 'BOUVET ISLAND', 'no_kp_wujud' => '887892039159', 'no_kp_kemaskini' => '887892039159' , 'created_at' => '2021-06-14 23:48:07', 'updated_at' => '2021-06-14 23:48:07'],
        //         ['kod_negara' => 'BRA', 'keterangan' => 'BRAZIL', 'no_kp_wujud' => '887892039159', 'no_kp_kemaskini' => '887892039159' , 'created_at' => '2021-06-14 23:48:07', 'updated_at' => '2021-06-14 23:48:07'],

        //         ['kod_negara' => 'IOT', 'keterangan' => 'BRITISH INDIAN OCEAN TERRITORY', 'no_kp_wujud' => '887892039159', 'no_kp_kemaskini' => '887892039159', 'created_at' => '2021-06-14 23:48:07', 'updated_at' => '2021-06-14 23:48:07'],
        //         ['kod_negara' => 'BRN', 'keterangan' => 'BRUNEI DARUSSALAM', 'no_kp_wujud' => '887892039159', 'no_kp_kemaskini' => '887892039159', 'created_at' => '2021-06-14 23:48:07', 'updated_at' => '2021-06-14 23:48:07'],
        //         ['kod_negara' => 'BGR', 'keterangan' => 'BULGARIA', 'no_kp_wujud' => '887892039159', 'no_kp_kemaskini' => '887892039159', 'created_at' => '2021-06-14 23:48:07', 'updated_at' => '2021-06-14 23:48:07'],
        //         ['kod_negara' => 'BFA', 'keterangan' => 'BURKINA FASO', 'no_kp_wujud' => '887892039159', 'no_kp_kemaskini' => '887892039159' , 'created_at' => '2021-06-14 23:48:07', 'updated_at' => '2021-06-14 23:48:07'],
        //         ['kod_negara' => 'BDI', 'keterangan' => 'BURUNDI', 'no_kp_wujud' => '887892039159', 'no_kp_kemaskini' => '887892039159' , 'created_at' => '2021-06-14 23:48:07', 'updated_at' => '2021-06-14 23:48:07'],
        //         ['kod_negara' => 'KHM', 'keterangan' => 'CAMBODIA', 'no_kp_wujud' => '887892039159', 'no_kp_kemaskini' => '887892039159' , 'created_at' => '2021-06-14 23:48:07', 'updated_at' => '2021-06-14 23:48:07'],
        //         ['kod_negara' => 'CMR', 'keterangan' => 'CAMEROON', 'no_kp_wujud' => '887892039159', 'no_kp_kemaskini' => '887892039159' , 'created_at' => '2021-06-14 23:48:07', 'updated_at' => '2021-06-14 23:48:07'],
        //         ['kod_negara' => 'CAN', 'keterangan' => 'CANADA', 'no_kp_wujud' => '887892039159', 'no_kp_kemaskini' => '887892039159' , 'created_at' => '2021-06-14 23:48:07', 'updated_at' => '2021-06-14 23:48:07'],
        //         ['kod_negara' => 'CPV', 'keterangan' => 'CAPE VERDE', 'no_kp_wujud' => '887892039159', 'no_kp_kemaskini' => '887892039159' , 'created_at' => '2021-06-14 23:48:07', 'updated_at' => '2021-06-14 23:48:07'],
        //         ['kod_negara' => 'CYM', 'keterangan' => 'CAYMAN ISLANDS', 'no_kp_wujud' => '887892039159', 'no_kp_kemaskini' => '887892039159' , 'created_at' => '2021-06-14 23:48:07', 'updated_at' => '2021-06-14 23:48:07'],
        //         ['kod_negara' => 'CAF', 'keterangan' => 'CENTRAL AFRICAN REPUBLIC', 'no_kp_wujud' => '887892039159', 'no_kp_kemaskini' => '887892039159' , 'created_at' => '2021-06-14 23:48:07', 'updated_at' => '2021-06-14 23:48:07'],
        //         //
        //     ],
        // );

        // $faker = Faker::create();
    	// foreach (range(1,50) as $index)
        // {
        //     DB::table('negara')->insert(
        //         [
        //             'kod_negara' => $faker->countryCode,
        //             'keterangan' => $faker->country,
        //             'no_kp_wujud' => '887892039159' ,
        //             'no_kp_kemaskini' => '887892039159' ,
        //             'created_at' => $faker->date($format = 'Y-m-d', $max = 'now'),
        //             'updated_at' => $faker->date($format = 'Y-m-d', $max = 'now')
        //         ]);
        // }
    }
}
