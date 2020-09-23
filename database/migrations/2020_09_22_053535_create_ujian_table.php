<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUjianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ujian', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('kelas_id')->unsigned();
            $table->bigInteger('guru_id')->unsigned();
            $table->bigInteger('paket_soal_id')->unsigned();
            $table->string('nama_ujian');
            $table->string('deskripsi');
            $table->tinyInteger('status');
            $table->timestamps();
            $table->foreign('kelas_id')->references('id')->on('kelas');
            $table->foreign('guru_id')->references('id')->on('guru');
            $table->foreign('paket_soal_id')->references('id')->on('paket_soal');



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ujian');
    }
}
