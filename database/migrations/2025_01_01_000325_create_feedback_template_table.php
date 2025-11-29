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
        // templates of feedbackstructures
        Schema::create('feedback_template', function (Blueprint $table) {
            $table->id('id');
            $table->integer('course')->default(0);
            $table->boolean('ispublic')->default(0);
            $table->string('name', 255);

            // Indexes
            $table->index(['course'], 'course');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feedback_template');
    }
};
