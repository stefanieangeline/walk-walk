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
        Schema::create('airport_tenants_headers', function (Blueprint $table) {
            $table->foreignId('IDAirport')->constrained()->cascadeOnDelete()->cascadeOnUpdate()->references('IDAirport')->on('airports');
            $table->foreignId('IDTenants')->constrained()->cascadeOnDelete()->cascadeOnUpdate()->references('IDTenants')->on('airport_tenants_details');
            $table->primary(['IDAirport','IDTenants']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('airport_tenants_headers');
    }
};
