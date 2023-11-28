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
        Schema::create('plane_payments', function (Blueprint $table) {
            $table->id('IDPlanePayment');
            $table->foreignId('IDPlaneTicket')->constrained()->cascadeOnDelete()->cascadeOnUpdate()->references('IDPlaneTicket')->on('plane_tickets');
            $table->foreignId('IDUser')->constrained()->cascadeOnDelete()->cascadeOnUpdate()->references('IDUser')->on('users');
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
        Schema::dropIfExists('plane_payments');
    }
};
