<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSejarahStatusPengajianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sejarah_status_pengajian', function (Blueprint $table) {
            $table->id();
            $table->date('tarikh_mula')->nullable();
            $table->date('tarikh_tamat')->nullable();
            $table->timestamps();

            $table->unsignedBigInteger('pengajian_pelajar_id');
            $table->foreign('pengajian_pelajar_id')->references('id')->on('pengajian_pelajar');

            $table->unsignedBigInteger('status_pengajian_id')->nullable();
            $table->foreign('status_pengajian_id')->references('id')->on('status_pengajian');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sejarah_status_pengajian');
    }
}
