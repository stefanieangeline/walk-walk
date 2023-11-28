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
        Schema::create('room_facility_details', function (Blueprint $table) {
            // $table->foreign('IDHotel')->constrained()->cascadeOnDelete()->cascadeOnUpdate()->references('IDHotel')->on('hotels');
            $table->unsignedBigInteger('IDHotel');
            $table->string('TypeRoom');
            $table->foreign(['IDHotel','TypeRoom'])->constrained()->cascadeOnDelete()->cascadeOnUpdate()->references(['IDHotel','TypeRoom'])->on('hotel_rooms');
            $table->string('NameFacilityRoom')->unique();
            $table->primary(['IDHotel','TypeRoom','NameFacilityRoom']);
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
        Schema::dropIfExists('room_facility_details');
    }
};
