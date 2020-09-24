<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePesertaUjianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peserta_ujian', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('anggota_kelas_id')->unsigned();
            $table->bigInteger('ujian_id')->unsigned();
            $table->integer('status');
            $table->string('keterangan');
            $table->timestamps();
            $table->foreign('anggota_kelas_id')->references('id')->on('anggota_kelas');
            $table->foreign('ujian_id')->references('id')->on('ujian');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peserta_ujian');
    }
}
