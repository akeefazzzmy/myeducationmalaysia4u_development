<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            // $table->id();
            // $table->string('no_kp', 12);
            // $table->string('kata_laluan');
            // $table->string('nama');
            // $table->string('emel');
            // $table->string('no_tel');
            // $table->string('image_file');
            // $table->string('no_kp_wujud', 12);
            // $table->string('no_kp_kemaskini', 12);
            // $table->timestamps();

            $table->id();
            $table->string('no_kp', 12)->nullable();
            $table->string('name')->nullable();
            // $table->string('email')->unique();
            $table->string('email')->nullable();
            $table->string('no_tel')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->string('image_file')->nullable();
            $table->string('no_kp_wujud', 12)->nullable();
            $table->string('no_kp_kemaskini', 12)->nullable(); 

            $table->unsignedBigInteger('capaian_id')->nullable();
            $table->foreign('capaian_id')->references('id')->on('capaian');

            $table->unsignedBigInteger('em_id')->nullable();
            $table->foreign('em_id')->references('id')->on('em');

            $table->unsignedBigInteger('negara_id')->nullable();
            $table->foreign('negara_id')->references('id')->on('negara');

            $table->unsignedBigInteger('status_users_id')->nullable();
            $table->foreign('status_users_id')->references('id')->on('status_users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
