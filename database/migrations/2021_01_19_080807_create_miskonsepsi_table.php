<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMiskonsepsiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('miskonsepsi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('jenis');
            $table->string('tk_1');
            $table->string('tk_2');
            $table->string('tk_3');
            $table->string('tk_4');
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
        Schema::dropIfExists('miskonsepsi');
    }
}
