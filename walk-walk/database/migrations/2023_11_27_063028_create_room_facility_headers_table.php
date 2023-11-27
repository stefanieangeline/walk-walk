<?php

use App\Models\HotelRooms;
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
        Schema::create('room_facility_headers', function (Blueprint $table) {

            // $table->primary(['IDDetailFacility','IDHotel','TypeRoom']);
            $table->foreignId('IDDetailFacility')->constrained()->cascadeOnDelete()->cascadeOnUpdate()->references('IDDetailFacility')->on('room_facility_details');
           
            $table->foreignId('IDHotel')->constrained()->cascadeOnDelete()->cascadeOnUpdate()->references('IDHotel')->on('hotel_rooms');;
            $table->foreignId('TypeRoom')->constrained()->cascadeOnDelete()->cascadeOnUpdate()->references('TypeRoom')->on('hotel_rooms');
            // $table->foreignId('IDHotel','TypeRoom')->constrained()->cascadeOnDelete()->cascadeOnUpdate()->references('IDHotel','TypeRoom')->on('hotel_rooms');
        




        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('room_facility_headers');
    }
};
