<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('states', function (Blueprint $table) {
            $table->id();
            $table->string('kod_states', 10);
            $table->string('keterangan');
            $table->string('no_kp_wujud', 12)->nullable();
            $table->string('no_kp_kemaskini', 12)->nullable();
            $table->timestamps();

            // $table->unsignedBigInteger('negara_id');
            // $table->foreign('negara_id')->references('negara_id')->on('liputan_em');

            //plan nak pakai yang ni
            // $table->unsignedBigInteger('negara_id');
            // $table->foreign('negara_id')->references('id')->on('negara');
            //buat sementara pakai ini
            $table->string('kod_negara')->foreign('kod_negara')->references('kod_negara')->on('negara');

            // $table->unsignedBigInteger('liputanEm_id');
            // $table->foreign('liputanEm_id')->references('id')->on('liputan_em');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('states');
    }
}
