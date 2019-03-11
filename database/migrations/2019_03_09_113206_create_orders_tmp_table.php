<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTmpTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders_tmp', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_pelanggan');
            $table->integer('meja_id')->unsigned();
            $table->timestamps();

            $table->foreign('meja_id')->references('id')->on('meja');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders_tmp');
    }
}
