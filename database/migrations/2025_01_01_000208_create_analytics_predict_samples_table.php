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
        // Samples already used for predictions.
        Schema::create('analytics_predict_samples', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('modelid');
            $table->integer('analysableid');
            $table->string('timesplitting', 255);
            $table->integer('rangeindex');
            $table->text('sampleids');
            $table->integer('timecreated')->default(0);
            $table->integer('timemodified')->default(0);

            // Indexes
            $table->index(['modelid', 'analysableid', 'timesplitting', 'rangeindex'], 'modelidandanalysableidandtimesplittingandrangeindex');

            // Foreign Keys
            $table->foreign('modelid')->references('id')->on('analytics_models');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('analytics_predict_samples');
    }
};
