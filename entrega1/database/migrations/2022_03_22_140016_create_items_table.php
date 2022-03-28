<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->integer('price');
            $table->integer('quantity');
            $table->unsignedBigInteger('order_id');
            $table->foreign('order_id')->references('id')->on('orders');
            $table->unsignedBigInteger('wine_id');
            $table->foreign('wine_id')->references('id')->on('wines');
            //$table->unsignedBigInteger('vasito_id');
            //$table->foreign('vasito_id')->references('id')->on('vasitos');
            //$table->unsignedBigInteger('combo_id');
            //$table->foreign('combo_id')->references('id')->on('combos');
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
        Schema::dropIfExists('items');
    }
};