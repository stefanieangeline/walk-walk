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
        Schema::create('schedules', function (Blueprint $table) {
            $table->id('IDSchedule');
            $table->string('FlightNumber');
            $table->foreignId('IDAirline')->constrained()->cascadeOnDelete()->cascadeOnUpdate()->references('IDAirline')->on('airlines');
            $table->foreignId('IDAirportSource')->constrained()->cascadeOnDelete()->cascadeOnUpdate()->references('IDAirport')->on('airports');
            $table->foreignId('IDAirportDestination')->constrained()->cascadeOnDelete()->cascadeOnUpdate()->references('IDAirport')->on('airports');
            $table->dateTime('DepartureTime');
            $table->dateTime('ArrivalTime');
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
        Schema::dropIfExists('schedules');
    }
};
