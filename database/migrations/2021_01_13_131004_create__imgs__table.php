<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImgsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Imgs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_pro')->unsigned();
            $table->foreign('id_pro')
                  ->references('id')
                  ->on('product')
                  ->onDelete('cascade');
            $table->string('img');
            $table->string('stt');
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
        Schema::dropIfExists('Imgs');
    }
}
