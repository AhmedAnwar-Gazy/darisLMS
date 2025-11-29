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
        // Defines badge related for badges
        Schema::create('badge_related', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('badgeid')->default(0);
            $table->unsignedBigInteger('relatedbadgeid')->nullable();

            // Unique Indexes
            $table->unique(['badgeid', 'relatedbadgeid'], 'badgeid-relatedbadgeid');

            // Foreign Keys
            $table->foreign('badgeid')->references('id')->on('badge');
            $table->foreign('relatedbadgeid')->references('id')->on('badge');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('badge_related');
    }
};
