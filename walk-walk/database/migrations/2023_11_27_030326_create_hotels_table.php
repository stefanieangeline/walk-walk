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
        Schema::create('hotels', function (Blueprint $table) {
            $table->id('IDHotel');
            $table->foreignId('IDCity')->constrained()->cascadeOnDelete()->cascadeOnUpdate()->references('IDCity')->on('cities');
            $table->string('NameHotel');
            $table->string('AddressHotel');
            $table->decimal('RatingHotel');
            $table->string('FacilityHotel');
            $table->string('StatusHotel');
            $table->integer('StarHotel');
            // $table->primary('IDHotel')

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hotels');
    }
};
