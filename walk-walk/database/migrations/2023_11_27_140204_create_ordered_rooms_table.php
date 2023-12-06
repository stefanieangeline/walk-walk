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
        Schema::create('ordered_rooms', function (Blueprint $table) {
            $table->id('IDOrder');
            $table->unsignedBigInteger('IDHotel');
            $table->string('TypeRoom');
            $table->foreign(['IDHotel','TypeRoom'])->constrained()->cascadeOnDelete()->cascadeOnUpdate()->references(['IDHotel','TypeRoom'])->on('hotel_rooms');
            $table->foreignId('id')->constrained()->cascadeOnDelete()->cascadeOnUpdate()->references('id')->on('users');
            $table->foreignId('IDAddOns')->constrained()->cascadeOnDelete()->cascadeOnUpdate()->references('IDAddOns')->on('add_ons');
            $table->date('CheckInDate');
            $table->date('CheckOutDate');
            $table->boolean('Status');
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
        Schema::dropIfExists('ordered_rooms');
    }
};
