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
        Schema::create('plane_tickets', function (Blueprint $table) {
            $table->id('IDPlaneTicket');
            $table->foreignId('IDSchedule')->constrained()->cascadeOnDelete()->cascadeOnUpdate()->references('IDSchedule')->on('schedules');
            $table->date('BookDate');
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
        Schema::dropIfExists('plane_tickets');
    }
};
