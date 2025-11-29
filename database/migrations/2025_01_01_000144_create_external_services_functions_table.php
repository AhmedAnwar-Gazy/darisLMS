<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // lists functions available in each service group
        Schema::create('external_services_functions', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('externalserviceid');
            $table->string('functionname', 200);

            // Foreign Keys
            $table->foreign('externalserviceid')->references('id')->on('external_services');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('external_services_functions');
    }
};
