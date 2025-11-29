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
        // Defines parameters for badges criteria
        Schema::create('badge_criteria_param', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('critid');
            $table->string('name', 255);
            $table->string('value', 255)->nullable();

            // Foreign Keys
            $table->foreign('critid')->references('id')->on('badge_criteria');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('badge_criteria_param');
    }
};
