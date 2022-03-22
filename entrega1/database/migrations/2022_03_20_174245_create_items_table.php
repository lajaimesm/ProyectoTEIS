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
            $table->float('subtotal');
            $table->integer('amount');
            $table->unsignedBigInteger('wine_id');
            $table->unsignedBigInteger('vasito_id');
            $table->foreign('wine_id')->references('id')->on('wines');
            $table->foreign('vasito_id')->references('id')->on('vasitos');
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
