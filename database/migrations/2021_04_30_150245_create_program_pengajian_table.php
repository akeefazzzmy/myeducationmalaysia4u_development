<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramPengajianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('program_pengajian', function (Blueprint $table)
        {
            $table->id();
            $table->string('kod_program_pengajian')->nullable();//asalnya tak boleh nullable, nullable buat sementara
            $table->string('keterangan');
            $table->timestamps();
            
            //plan nye nak pakai yg ni start
            // $table->unsignedBigInteger('bidang_id')->nullable(); //ikutkan xleh nullable
            // $table->foreign('bidang_id')->references('id')->on('bidang');
            //plan nye nak pakai yg ni end

            //sementara start
            $table->string('kod_bidang')->foreign('kod_bidang')->references('kod_bidang')->on('bidang');
            // $table->foreign('kod_bidang')->references('kod_bidang')->on('bidang');
            //sementara end

            // $table->unsignedBigInteger('tahap_pengajian_id');
            // $table->foreign('tahap_pengajian_id')->references('id')->on('tahap_pengajian');

            // $table->unsignedBigInteger('bidang_id');
            // $table->foreign('bidang_id')->references('id')->on('bidang');

            // $table->unsignedBigInteger('institusi_id');
            // $table->foreign('institusi_id')->references('id')->on('institusi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('program_pengajian');
    }
}
