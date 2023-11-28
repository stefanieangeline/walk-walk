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
        Schema::create('hotel_rooms', function (Blueprint $table) {
            $table->foreignId('IDHotel')->constrained()->cascadeOnDelete()->cascadeOnUpdate()->references('IDHotel')->on('hotels');
            $table->string('TypeRoom');
            $table->integer('CapacityRoom');
            $table->integer('PriceRoom');
            $table->foreignId('IDAddOns')->constrained()->cascadeOnDelete()->cascadeOnUpdate()->references('IDAddOns')->on('add_ons');
            $table->integer('WideRoom');
            $table->primary(['IDHotel','TypeRoom']);
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
        Schema::dropIfExists('hotel_rooms');
    }
};
