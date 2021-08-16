<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use DB;

class WarisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('waris')->insert(
            [
                ['no_kp' => '01', 'nama' => 'Ashraff', 'alamat' => 'Lot 30, Petaling Lakefields', 'bandar' => 'Subang', 'poskod' => '53899', 'no_tel' => '0198782546', 'no_kp_wujud' => '879092736451', 'no_kp_kemaskini' => '879092736451', 'profil_pelajar_id' => '1', 'hubungan_id' => '1'],
                ['no_kp' => '02', 'nama' => 'Budin', 'alamat' => 'Lot 30, Petaling Lakefields', 'bandar' => 'Subang', 'poskod' => '53899', 'no_tel' => '0198778909', 'no_kp_wujud' => '879092736451', 'no_kp_kemaskini' => '879092736451', 'profil_pelajar_id' => '1', 'hubungan_id' => '2'],
                ['no_kp' => '03', 'nama' => 'Dahlia', 'alamat' => 'Lot 30, Petaling Lakefields', 'bandar' => 'Subang', 'poskod' => '53899', 'no_tel' => '0111123410', 'no_kp_wujud' => '879092736451', 'no_kp_kemaskini' => '879092736451', 'profil_pelajar_id' => '1', 'hubungan_id' => '3'],
                ['no_kp' => '04', 'nama' => 'Ismail', 'alamat' => 'Lot 30, Petaling Lakefields', 'bandar' => 'Subang', 'poskod' => '53899', 'no_tel' => '0198985012', 'no_kp_wujud' => '879092736451', 'no_kp_kemaskini' => '879092736451', 'profil_pelajar_id' => '1', 'hubungan_id' => '4'],
                ['no_kp' => '05', 'nama' => 'Samad', 'alamat' => 'Lot 30, Petaling Lakefields', 'bandar' => 'Subang', 'poskod' => '53899', 'no_tel' => '0109805561', 'no_kp_wujud' => '879092736451', 'no_kp_kemaskini' => '879092736451', 'profil_pelajar_id' => '1', 'hubungan_id' => '5'],
            ],
        );
    }
}
