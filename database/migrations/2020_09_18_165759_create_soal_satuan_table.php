<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSoalSatuanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soal_satuan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('paket_soal_id')->unsigned();
            $table->tinyInteger('tingkatan');
            $table->text('indikator');
            $table->boolean('isdelete')->default(false);
            $table->timestamps();
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
        Schema::dropIfExists('soal_satuan');
    }
}
