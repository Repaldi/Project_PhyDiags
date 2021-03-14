<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePanduanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('panduan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_panduan');
            $table->text('dokumen')->nullable();
            $table->text('gambar')->nullable();
            $table->text('deskripsi')->nullable();
            $table->text('link_video')->nullable();
            $table->tinyInteger('isfor'); 
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
        Schema::dropIfExists('panduan');
    }
}
