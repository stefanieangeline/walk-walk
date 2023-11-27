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
        Schema::create('hotel_facility_headers', function (Blueprint $table) {
           
            $table->foreignId('IDHotel')->constrained()->cascadeOnDelete()->cascadeOnUpdate()->references('IDHotel')->on('hotels');
            $table->foreignId('IDDetailFacilityHotel')->constrained()->cascadeOnDelete()->cascadeOnUpdate()->references('IDDetailFacilityHotel')->on('hotel_facility_details');
            $table->primary(['IDHotel','IDDetailFacilityHotel']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hotel_facility_headers');
    }
};
