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
        // gradebook settings
        Schema::create('grade_settings', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('courseid');
            $table->string('name', 255);
            $table->text('value')->nullable();

            // Unique Indexes
            $table->unique(['courseid', 'name'], 'courseid-name');

            // Foreign Keys
            $table->foreign('courseid')->references('id')->on('course');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grade_settings');
    }
};
