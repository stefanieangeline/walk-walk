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
        Schema::create('schedule_details', function (Blueprint $table) {
            $table->foreignId('IDSchedule')->constrained()->cascadeOnDelete()->cascadeOnUpdate()->references('IDSchedule')->on('schedules');
            $table->string('Class');
            $table->integer('BaggageCabin');
            $table->integer('Baggage');
            $table->double('Price');
            $table->integer('Seat');
            $table->primary(['IDSchedule','Class']);
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
        Schema::dropIfExists('schedule_details');
    }
};
