<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert(
            [            
                //ADMIN    
                [
                    'no_kp' => '887892039159',
                    'password' => Hash::make('1234'),
                    'name' => 'Salim Bin Jumaat',
                    'email' => 'salimJumaat@mohe.gov.my',
                    'no_tel' => '0178764321',
                    
                    'no_kp_wujud' => '779032781927',
                    'no_kp_kemaskini' => '778925673213',
                    'capaian_id' => '1',
                    'status_users_id' => '1',
                    'em_id' => null
                ],

                // Pegawai BEM
                [
                    'no_kp' => '772839761234',
                    'password' => Hash::make('1234'),
                    'name' => 'Juliana Binti Asri',
                    'email' => 'julianaAS@mohe.gov.my',
                    'no_tel' => '0198782635',
                    
                    'no_kp_wujud' => '779032781927',
                    'no_kp_kemaskini' => '778925673213',
                    'capaian_id' => '2',
                    'status_users_id' => '1',
                    'em_id' => null
                ],

                // EM
                [
                    'no_kp' => '887265012343',
                    'password' => Hash::make('1234'),
                    'name' => 'Mahmud Bin Sulaiman',
                    'email' => 'mahmudS@mohe.gov.my',
                    'no_tel' => '0198980854',
                    
                    'no_kp_wujud' => '779032781927',
                    'no_kp_kemaskini' => '778925673213',
                    'capaian_id' => '3',
                    'status_users_id' => '1',
                    'em_id' => '1'
                ],
                [
                    'no_kp' => '756764382734',
                    'password' => Hash::make('1234'),
                    'name' => 'Nasir Bin Hashim',
                    'email' => 'nasirHash@mohe.gov.my',
                    'no_tel' => '0156476532',
                    
                    'no_kp_wujud' => '779032781927',
                    'no_kp_kemaskini' => '778925673213',
                    'capaian_id' => '3',
                    'status_users_id' => '1',
                    'em_id' => '2'
                ],

                // DUTA
                [
                    'no_kp' => '720981234231',
                    'password' => Hash::make('1234'),
                    'name' => 'Aisyah Binti Nazri',
                    'email' => 'aisyahNazri@mohe.gov.my',
                    'no_tel' => '0198202143',
                    
                    'no_kp_wujud' => '779032781927',
                    'no_kp_kemaskini' => '778925673213',
                    'capaian_id' => '4',
                    'status_users_id' => '1',
                    'em_id' => null,
                    // 'negara_id' => null,
                ],

                // PELAJAR CAPAIAN ID = 5
                [
                    'no_kp' => '901928760234',
                    'password' => Hash::make('1234'),
                    'name' => 'Rahman Bin Ismail',
                    'email' => 'rahmanIsmail@mohe.gov.my',
                    'no_tel' => '0198201653',
                    
                    'no_kp_wujud' => '779032781927',
                    'no_kp_kemaskini' => '778925673213',
                    'capaian_id' => '5',
                    'status_users_id' => '1', //status_users_id -> status_user_id
                    'em_id' => '1'
                ], 
                [
                    'no_kp' => '871827364510',
                    'password' => Hash::make('1234'),
                    'name' => 'Junaidi Bin Samad',
                    'email' => 'junaidiSamad@mohe.gov.my',
                    'no_tel' => '0198091625',
                    
                    'no_kp_wujud' => '779032781927',
                    'no_kp_kemaskini' => '778925673213',
                    'capaian_id' => '5',
                    'status_users_id' => '1', //status_users_id -> status_user_id
                    'em_id' => '2'
                ],
                
                [
                    'no_kp' => '930498374612',
                    'password' => Hash::make('1234'),
                    'name' => 'Ehsan Bin Shaleh',
                    'email' => 'ehsanShaleh@mohe.gov.my',
                    'no_tel' => '011287364532',
                    
                    'no_kp_wujud' => '779032781927',
                    'no_kp_kemaskini' => '778925673213',
                    'capaian_id' => '5',
                    'status_users_id' => '1', //status_users_id -> status_user_id
                    'em_id' => '3'
                ],  
                [
                    'no_kp' => '772837625142',
                    'password' => Hash::make('1234'),
                    'name' => 'Emran Bin Ridwan',
                    'email' => 'emran Ridwan@mohe.gov.my',
                    'no_tel' => '0123215672',
                    
                    'no_kp_wujud' => '779032781927',
                    'no_kp_kemaskini' => '778925673213',
                    'capaian_id' => '5',
                    'status_users_id' => '1', //status_users_id -> status_user_id
                    'em_id' => '4'
                ],  
                [
                    'no_kp' => '992038476782',
                    'password' => Hash::make('1234'),
                    'name' => 'Jabir Bin Azeem',
                    'email' => 'jabirAzeem@mohe.gov.my',
                    'no_tel' => '0109829102',
                    
                    'no_kp_wujud' => '779032781927',
                    'no_kp_kemaskini' => '778925673213',
                    'capaian_id' => '5',
                    'status_users_id' => '1', //status_users_id -> status_user_id
                    'em_id' => '5'
                ],  
                [
                    'no_kp' => '990987023453',
                    'password' => Hash::make('1234'),
                    'name' => 'Rusydi Bin Iman',
                    'email' => 'rusydiIman@mohe.gov.my',
                    'no_tel' => '0142362836',
                    
                    'no_kp_wujud' => '779032781927',
                    'no_kp_kemaskini' => '778925673213',
                    'capaian_id' => '5',
                    'status_users_id' => '1', //status_users_id -> status_user_id
                    'em_id' => '6'
                ],  
                [
                    'no_kp' => '982736251087',
                    'password' => Hash::make('1234'),
                    'name' => 'Hazirah Syakira Binti Razif',
                    'email' => 'hazirahSyakira@mohe.gov.my',
                    'no_tel' => '0187823456',
                    
                    'no_kp_wujud' => '779032781927',
                    'no_kp_kemaskini' => '778925673213',
                    'capaian_id' => '5',
                    'status_users_id' => '1', //status_users_id -> status_user_id
                    'em_id' => '7'
                ],  
                [
                    'no_kp' => '892654738651',
                    'password' => Hash::make('1234'),
                    'name' => 'Hamlan Sharif Bin Samad',
                    'email' => 'hamlanSharif@mohe.gov.my',
                    'no_tel' => '0198091625',
                    
                    'no_kp_wujud' => '779032781927',
                    'no_kp_kemaskini' => '778925673213',
                    'capaian_id' => '5',
                    'status_users_id' => '1', //status_users_id -> status_user_id
                    'em_id' => '8'
                ],  
                [
                    'no_kp' => '867345261723',
                    'password' => Hash::make('1234'),
                    'name' => 'Husni Zulfadhli Bin Samad',
                    'email' => 'husniZulfadhli@mohe.gov.my',
                    'no_tel' => '0198785432',
                    
                    'no_kp_wujud' => '779032781927',
                    'no_kp_kemaskini' => '778925673213',
                    'capaian_id' => '5',
                    'status_users_id' => '1', //status_users_id -> status_user_id
                    'em_id' => '9'
                ],  
                [
                    'no_kp' => '817263019287',
                    'password' => Hash::make('1234'),
                    'name' => 'Burhanuddin Bin Majduddin',
                    'email' => 'burhanuddinMajduddin@mohe.gov.my',
                    'no_tel' => '0198782341',
                    
                    'no_kp_wujud' => '779032781927',
                    'no_kp_kemaskini' => '778925673213',
                    'capaian_id' => '5',
                    'status_users_id' => '1', //status_users_id -> status_user_id
                    'em_id' => '10'
                ],  
                [
                    'no_kp' => '809176542372',
                    'password' => Hash::make('1234'),
                    'name' => 'Badar Bin Sahli',
                    'email' => 'badarSahli@mohe.gov.my',
                    'no_tel' => '0156273421',
                    
                    'no_kp_wujud' => '779032781927',
                    'no_kp_kemaskini' => '778925673213',
                    'capaian_id' => '5',
                    'status_users_id' => '1', //status_users_id -> status_user_id
                    'em_id' => '11'
                ],  
                [
                    'no_kp' => '998253421653',
                    'password' => Hash::make('1234'),
                    'name' => 'Irsyad Bin Nashir',
                    'email' => 'irsyadNashir@mohe.gov.my',
                    'no_tel' => '0143982765',
                    
                    'no_kp_wujud' => '779032781927',
                    'no_kp_kemaskini' => '778925673213',
                    'capaian_id' => '5',
                    'status_users_id' => '1', //status_users_id -> status_user_id
                    'em_id' => '11'
                ],  
                [
                    'no_kp' => '928376834210',
                    'password' => Hash::make('1234'),
                    'name' => 'Ikhtiari Bin Wafiy',
                    'email' => 'ikhtiariWafiy@mohe.gov.my',
                    'no_tel' => '0167265341',
                    
                    'no_kp_wujud' => '779032781927',
                    'no_kp_kemaskini' => '778925673213',
                    'capaian_id' => '5',
                    'status_users_id' => '1', //status_users_id -> status_user_id
                    'em_id' => '11'
                ],  
                [
                    'no_kp' => '872536542132',
                    'password' => Hash::make('1234'),
                    'name' => 'Jazil Bin Nazir',
                    'email' => 'jazilNazir@mohe.gov.my',
                    'no_tel' => '0182654132',
                    
                    'no_kp_wujud' => '779032781927',
                    'no_kp_kemaskini' => '778925673213',
                    'capaian_id' => '5',
                    'status_users_id' => '1', //status_users_id -> status_user_id
                    'em_id' => '1'
                ],  
            ]
        );
    }
}
