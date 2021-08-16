<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            AgamaSeeder::class,
            CapaianSeeder::class,
            BangsaSeeder::class,
            EmSeeder::class,
            HubunganSeeder::class,
            JantinaSeeder::class,            
            NegaraSeeder::class,
            LiputanEmSeeder::class,
            NegeriSeeder::class,
            PenajaSeeder::class,
            StatusUsersSeeder::class,
            UsersSeeder::class,
            ProfilPelajarSeeder::class,
            WarisSeeder::class,
            TahapPengajianSeeder::class,
            StatesSeeder::class,
            InstitusiSeeder::class,
            BidangSeeder::class,
            ProgramPengajianSeeder::class,
            StatusPengajianSeeder::class,
            PengajianPelajarSeeder::class,
            SejarahStatusPengajianSeeder::class,
            AlamatPenginapanPengajianSeeder::class,
            PenajaPengajianSeeder::class,
            StatusVaksinasiSeeder::class,
            // JenisVaksinSeeder::class
            
        ]);
    }
}
