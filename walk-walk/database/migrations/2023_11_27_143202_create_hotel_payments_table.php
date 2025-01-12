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
        Schema::create('hotel_payments', function (Blueprint $table) {
            $table->id('IDHotelPayment');
            $table->foreignId('IDOrder')->constrained()->cascadeOnDelete()->cascadeOnUpdate()->references('IDOrder')->on('ordered_rooms');
            $table->foreignId('id')->constrained()->cascadeOnDelete()->cascadeOnUpdate()->references('id')->on('users');
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
        Schema::dropIfExists('hotel_payments');
    }
};
