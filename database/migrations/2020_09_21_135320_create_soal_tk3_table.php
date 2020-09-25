<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSoalTk3Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soal_tk3', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('soal_satuan_id')->unsigned();
            $table->text('pertanyaan');
            $table->string('pil_a');
            $table->string('pil_b');
            $table->string('pil_c');
            $table->string('pil_d');
            $table->string('gambar');
            $table->string('kunci');
            $table->timestamps();
            $table->foreign('soal_satuan_id')->references('id')->on('soal_satuan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('soal_tk3');
    }
}
