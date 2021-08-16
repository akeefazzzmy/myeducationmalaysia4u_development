<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenajaPengajianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penaja_pengajian', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('pengajian_pelajar_id');
            $table->foreign('pengajian_pelajar_id')->references('id')->on('pengajian_pelajar');

            $table->unsignedBigInteger('penaja_id')->nullable();
            $table->foreign('penaja_id')->references('id')->on('penaja');
            
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
        Schema::dropIfExists('penaja_pengajian');
    }
}
