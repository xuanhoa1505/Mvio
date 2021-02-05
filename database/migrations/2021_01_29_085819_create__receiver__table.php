<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReceiverTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Receiver', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->integer('ord_id')->unsigned();
            $table->foreign('ord_id')
                  ->references('id')
                  ->on('order')
                  ->onDelete('cascade');
            $table->string('address')->nullable();
            $table->string('phone');
            $table->string('email')->nullable();
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
        Schema::dropIfExists('Receiver');
    }
}
