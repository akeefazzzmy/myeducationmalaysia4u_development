<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilPelajarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profil_pelajar', function (Blueprint $table) {
            $table->id();
            // $table->string('no_kp', 12);
            $table->string('no_passport', 12)->nullable();
            $table->date('tarikh_lahir')->nullable();
            $table->string('alamat_malaysia')->nullable();
            $table->string('poskod_malaysia')->nullable();
            $table->string('bandar_malaysia')->nullable();
            $table->timestamps();

            $table->unsignedBigInteger('users_id')->nullable();
            $table->foreign('users_id')->references('id')->on('users');

            $table->unsignedBigInteger('negeri_lahir')->nullable();
            $table->foreign('negeri_lahir')->references('id')->on('negeri');
            
            $table->unsignedBigInteger('negeri_alamat')->nullable();
            $table->foreign('negeri_alamat')->references('id')->on('negeri');

            $table->unsignedBigInteger('agama_id')->nullable();
            $table->foreign('agama_id')->references('id')->on('agama');

            $table->unsignedBigInteger('bangsa_id')->nullable();
            $table->foreign('bangsa_id')->references('id')->on('bangsa');

            $table->unsignedBigInteger('jantina_id')->nullable();
            $table->foreign('jantina_id')->references('id')->on('jantina');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profil_pelajar');
    }
}
