<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Product', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug');
            $table->string('ma');
            $table->string('des');
            $table->integer('id_des')->unsigned();
            $table->foreign('id_des')
                  ->references('id')
                  ->on('Designer')
                  ->onDelete('cascade');
            $table->string('pro_nguyenlieu');
            $table->string('price');
            $table->string('price_sale')->nullable();
            $table->string('img');
            $table->string('pro_stt');
            $table->string('muc');
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
        Schema::dropIfExists('Product');
    }
}
