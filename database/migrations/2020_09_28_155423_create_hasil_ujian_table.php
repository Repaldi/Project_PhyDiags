<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHasilUjianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hasil_ujian', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('peserta_ujian_id')->unsigned();
            $table->bigInteger('soal_satuan_id')->unsigned();
            $table->bigInteger('jawaban_tk1_id')->unsigned()->nullable();
            $table->bigInteger('jawaban_tk2_id')->unsigned()->nullable();
            $table->bigInteger('jawaban_tk3_id')->unsigned()->nullable();
            $table->bigInteger('jawaban_tk4_id')->unsigned()->nullable();
            $table->string('hasil')->nullable();
            $table->string('keterangan')->nullable();
            $table->timestamps();
            $table->foreign('peserta_ujian_id')->references('id')->on('peserta_ujian');
            $table->foreign('soal_satuan_id')->references('id')->on('soal_satuan');
            $table->foreign('jawaban_tk1_id')->references('id')->on('jawaban_tk1');
            $table->foreign('jawaban_tk2_id')->references('id')->on('jawaban_tk2');
            $table->foreign('jawaban_tk3_id')->references('id')->on('jawaban_tk3');
            $table->foreign('jawaban_tk4_id')->references('id')->on('jawaban_tk4');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hasil_ujian');
    }
}
