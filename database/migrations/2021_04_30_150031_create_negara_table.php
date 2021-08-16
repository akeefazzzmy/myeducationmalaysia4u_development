<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNegaraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('negara', function (Blueprint $table) {
            $table->id();
            $table->string('kod_negara', 5);
            $table->string('keterangan');
            $table->string('no_kp_wujud', 12)->nullable();
            $table->string('no_kp_kemaskini', 12)->nullable();
            $table->timestamps();

            // $table->unsignedBigInteger('liputan_em_id');
            // $table->foreign('liputan_em_id')->references('id')->on('liputan_em');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('negara');
    }
}
