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
        Schema::create('passengers', function (Blueprint $table) {
            $table->id('IDPassenger');
            $table->string('NamePassenger');
            $table->string('GenderPassenger');
            $table->date('DOBPassenger');
            $table->string('PassportNoPassenger');
            $table->string('AgeCategoryPassenger');
            $table->foreignId('NationalityPassenger')->constrained()->cascadeOnDelete()->cascadeOnUpdate()->references('IDCountry')->on('countries');
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
        Schema::dropIfExists('passengers');
    }
};
