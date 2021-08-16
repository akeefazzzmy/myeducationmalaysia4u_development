<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlamatPenginapanPengajianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alamat_penginapan_pengajian', function (Blueprint $table) {
            $table->id();
            $table->string('alamat_penuh')->nullable();
            $table->timestamps();

            $table->unsignedBigInteger('pengajian_pelajar_id');
            $table->foreign('pengajian_pelajar_id')->references('id')->on('pengajian_pelajar');

            // $table->unsignedBigInteger('negara_id')->nullable();
            // $table->foreign('negara_id')->references('id')->on('negara');

            $table->string('kod_negara')->foreign('kod_negara')->references('kod_negara')->on('negara'); //sepatutnya pakai id, selepas tukar db pakai string negara

            $table->unsignedBigInteger('states_id')->nullable();
            $table->foreign('states_id')->references('id')->on('states');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alamat_penginapan_pengajian');
    }
}
