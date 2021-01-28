<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMiskonsepsiDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('miskonsepsi_detail', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('miskonsepsi_id');
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
        Schema::dropIfExists('miskonsepsi_detail');
    }
}
