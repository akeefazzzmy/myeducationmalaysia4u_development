<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVaksinasiPelajarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vaksinasi_pelajar', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('users_id')->nullable();
            $table->foreign('users_id')->references('id')->on('users');

            $table->unsignedBigInteger('status_vaksinasi_id')->nullable();
            $table->foreign('status_vaksinasi_id')->references('id')->on('status_vaksinasi');

            $table->unsignedBigInteger('jenis_vaksin_id')->nullable();
            $table->foreign('jenis_vaksin_id')->references('id')->on('jenis_vaksin');

            $table->date('tarikh')->nullable();

            // $table->date('tarikh_dos_pertama_vaksinasi')->nullable();
            // $table->date('tarikh_dos_kedua_vaksinasi')->nullable();
            
            $table->timestamps();

            // $table->foreign('status_vaksinasi_id')->references('id')->on('status_vaksinasi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kesihatan_pelajar');
    }
}
