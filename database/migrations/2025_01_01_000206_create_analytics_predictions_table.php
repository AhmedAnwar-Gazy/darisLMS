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
        // Predictions
        Schema::create('analytics_predictions', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('modelid');
            $table->unsignedBigInteger('contextid');
            $table->integer('sampleid');
            $table->smallInteger('rangeindex');
            $table->decimal('prediction', 10, 2);
            $table->decimal('predictionscore', 10, 5);
            $table->text('calculations');
            $table->integer('timecreated')->default(0);
            $table->integer('timestart')->nullable();
            $table->integer('timeend')->nullable();

            // Indexes
            $table->index(['modelid', 'contextid'], 'modelidandcontextid');

            // Foreign Keys
            $table->foreign('modelid')->references('id')->on('analytics_models');
            $table->foreign('contextid')->references('id')->on('context');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('analytics_predictions');
    }
};
