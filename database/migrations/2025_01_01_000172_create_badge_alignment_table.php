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
        // Defines alignment for badges
        Schema::create('badge_alignment', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('badgeid')->default(0);
            $table->string('targetname', 255);
            $table->string('targeturl', 255);
            $table->text('targetdescription')->nullable();
            $table->string('targetframework', 255)->nullable();
            $table->string('targetcode', 255)->nullable();

            // Foreign Keys
            $table->foreign('badgeid')->references('id')->on('badge');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('badge_alignment');
    }
};
