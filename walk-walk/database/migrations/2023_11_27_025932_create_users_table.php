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
        Schema::create('users', function (Blueprint $table) {
            $table->id('IDUser');
            $table->string('NameUser');
            $table->string('EmailUser')->unique();
            $table->string('NoTelpUser');
            $table->date('DOBUser');
            $table->string('PasswordUser');
            $table->foreignId('NationalityUser')->constrained()->cascadeOnDelete()->cascadeOnUpdate()->references('IDCountry')->on('countries');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
