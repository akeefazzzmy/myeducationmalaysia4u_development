<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWarisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('waris', function (Blueprint $table) {
            $table->id();
            $table->string('no_kp', 12)->nullable();
            $table->string('nama')->nullable();
            $table->string('alamat')->nullable();
            $table->string('bandar', 50)->nullable();
            $table->string('poskod', 7)->nullable();
            $table->string('no_tel', 15)->nullable();
            $table->string('no_kp_wujud', 12)->nullable();
            $table->string('no_kp_kemaskini', 12)->nullable();
            $table->timestamps();

            $table->unsignedBigInteger('profil_pelajar_id');
            $table->foreign('profil_pelajar_id')->references('id')->on('profil_pelajar');

            $table->unsignedBigInteger('hubungan_id')->nullable();
            $table->foreign('hubungan_id')->references('id')->on('hubungan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('waris');
    }
}
