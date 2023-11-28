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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id('IDReview');
            $table->foreignId('IDHotel')->constrained()->cascadeOnDelete()->cascadeOnUpdate()->references('IDHotel')->on('hotels');
            $table->foreignId('IDUser')->constrained()->cascadeOnDelete()->cascadeOnUpdate()->references('IDUser')->on('users');
            $table->string('Description',2000);
            $table->decimal('Rating');
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
        Schema::dropIfExists('reviews');
    }
};
