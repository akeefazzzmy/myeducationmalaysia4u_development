<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengajianPelajarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengajian_pelajar', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('profil_pelajar_id');
            $table->foreign('profil_pelajar_id')->references('id')->on('profil_pelajar');

            $table->string('kod_negara')->foreign('kod_negara')->references('kod_negara')->on('negara'); //sepatutnya pakai id, selepas tukar db
            $table->string('kod_states')->foreign('kod_states')->references('kod_states')->on('states'); //sepatutnya pakai id, selepas tukar db

            $table->unsignedBigInteger('institusi_id')->nullable();
            $table->foreign('institusi_id')->references('id')->on('institusi');

            $table->unsignedBigInteger('tahap_pengajian_id')->nullable();
            $table->foreign('tahap_pengajian_id')->references('id')->on('tahap_pengajian');

            //sebelum tukar db start
            // $table->unsignedBigInteger('bidang_id')->nullable();
            // $table->foreign('bidang_id')->references('id')->on('bidang');
            //sebelum tukar db end
            
            $table->string('kod_bidang')->foreign('kod_bidang')->references('kod_bidang')->on('bidang');

            // $table->string('kod_program')->foreign('kod_program')->references('kod_program')->on('program_pengajian');
            $table->unsignedBigInteger('program_pengajian_id')->nullable();
            $table->foreign('program_pengajian_id')->references('id')->on('program_pengajian');

            $table->unsignedBigInteger('penaja_id')->nullable();
            $table->foreign('penaja_id')->references('id')->on('penaja');

            // $table->unsignedBigInteger('program_pengajian_id')->nullable();
            // $table->foreign('program_pengajian_id')->references('id')->on('program_pengajian');

            $table->date('tarikh_mula')->nullable();
            $table->date('tarikh_tamat')->nullable();

            $table->unsignedBigInteger('status_pengajian_id')->nullable();
            $table->foreign('status_pengajian_id')->references('id')->on('status_pengajian');

            $table->unsignedBigInteger('user_id_kemaskini')->nullable();
            $table->foreign('user_id_kemaskini')->references('id')->on('users');

            $table->date('tarikh_kemaskini')->nullable();

            $table->unsignedBigInteger('user_id_wujud')->nullable();
            $table->foreign('user_id_wujud')->references('id')->on('users');

            $table->date('tarikh_wujud')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengajian_pelajar');
    }
}
