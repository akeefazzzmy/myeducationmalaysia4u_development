<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstitusiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('institusi', function (Blueprint $table) {
            $table->id();
            $table->string('kod_institusi');
            $table->string('keterangan');
            $table->timestamps();

            //plan nak pakai yang ini, states_id
            // $table->unsignedBigInteger('states_id');
            // $table->foreign('states_id')->references('id')->on('states');
            //buat sementara pakai ini
            $table->string('kod_states')->foreign('kod_states')->references('kod_states')->on('states');
            // $table->foreign('kod_states')->references('kod_states')->on('states');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('institusi');
    }
}
