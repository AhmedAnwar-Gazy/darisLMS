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
        // filled out feedback
        Schema::create('feedback_completed', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('feedback')->default(0);
            $table->integer('userid')->default(0);
            $table->integer('timemodified')->default(0);
            $table->integer('random_response')->default(0);
            $table->boolean('anonymous_response')->default(0);
            $table->unsignedBigInteger('courseid')->default(0);

            // Indexes
            $table->index(['userid'], 'userid');

            // Foreign Keys
            $table->foreign('feedback')->references('id')->on('feedback');
            $table->foreign('courseid')->references('id')->on('course');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feedback_completed');
    }
};
