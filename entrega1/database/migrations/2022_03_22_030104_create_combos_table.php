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
        Schema::create('combos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('amount');
            $table->float('price');
            $table->float('discount');
            $table->string('image');
            $table->unsignedBigInteger('vasitoId')->nullable();
            $table->foreign('vasitoId', 'fk_orders_vasitos')->references('id')->on('vasitos')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('wineId')->nullable();
            $table->foreign('wineId', 'fk_orders_wines')->references('id')->on('wines')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('combos');
    }
};
