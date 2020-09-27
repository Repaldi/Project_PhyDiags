<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJawabanTk2Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jawaban_tk2', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->bigInteger('peserta_ujian_id')->unsigned();
          $table->bigInteger('soal_tk2_id')->unsigned();
          $table->char('jawaban');
          $table->tinyInteger('kode');
          $table->timestamps();
          $table->foreign('peserta_ujian_id')->references('id')->on('peserta_ujian');
          $table->foreign('soal_tk2_id')->references('id')->on('soal_tk2');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jawaban_tk2');
    }
}
