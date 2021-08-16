<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('em', function (Blueprint $table) {
            $table->id();
            $table->string('kod_em');
            $table->string('keterangan');
            $table->string('kod_negara_em');

            $table->string('alamat');
            // $table->string('no_tel');
            // $table->string('fax');

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
        Schema::dropIfExists('em');
    }
}
