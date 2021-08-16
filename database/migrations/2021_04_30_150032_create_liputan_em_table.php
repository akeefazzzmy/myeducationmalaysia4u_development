<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLiputanEmTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('liputan_em', function (Blueprint $table)
        {
            $table->id();
            
            //asalnya nak pakai yang ini
            // $table->unsignedBigInteger('em_id');
            // $table->foreign('em_id')->references('id')->on('em');
            //tapi pakai yg ni kejap
            $table->string('kod_em')->foreign('kod_em')->references('kod_em')->on('em');

            //asalnya nak pakai yang ini
            // $table->string('negara_id')->nullable(); //negara bawah liputan EM
            // $table->unsignedBigInteger('negara_id')->nullable();
            // $table->foreign('negara_id')->references('id')->on('negara');
            //tapi pakai yg ni kejap
            $table->string('kod_negara')->foreign('kod_negara')->references('kod_negara')->on('negara');
            
            $table->string('no_kp_wujud', 12)->nullable();
            $table->string('no_kp_kemaskini', 12)->nullable();
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
        Schema::dropIfExists('liputan_em');
    }
}
