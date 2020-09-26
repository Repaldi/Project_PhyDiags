<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJawabanTk4Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jawaban_tk4', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->bigInteger('peserta_ujian_id')->unsigned();
          $table->bigInteger('soal_tk4_id')->unsigned();
          $table->char('jawaban');
          $table->tinyInteger('kode');
          $table->timestamps();
          $table->foreign('peserta_ujian_id')->references('id')->on('peserta_ujian');
          $table->foreign('soal_tk4_id')->references('id')->on('soal_tk4');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jawaban_tk4');
    }
}
