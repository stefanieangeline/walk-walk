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
        Schema::create('plane_ticket_details', function (Blueprint $table) {
            $table->foreignId('IDPlaneTicket')->constrained()->cascadeOnDelete()->cascadeOnUpdate()->references('IDPlaneTicket')->on('plane_tickets');
            $table->foreignId('IDPassenger')->constrained()->cascadeOnDelete()->cascadeOnUpdate()->references('IDPassenger')->on('passengers');
            $table->primary(['IDPlaneTicket','IDPassenger']);
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
        Schema::dropIfExists('plane_ticket_details');
    }
};
