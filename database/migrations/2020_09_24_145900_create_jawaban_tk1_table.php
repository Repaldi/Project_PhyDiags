<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJawabanTk1Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jawaban_tk1', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('peserta_ujian_id')->unsigned();
            $table->bigInteger('soal_tk1_id')->unsigned();
            $table->char('jawaban');
            $table->tinyInteger('kode');
            $table->timestamps();
            $table->foreign('peserta_ujian_id')->references('id')->on('peserta_ujian');
            $table->foreign('soal_tk1_id')->references('id')->on('soal_tk1');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jawaban_tk1');
    }
}
