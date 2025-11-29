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
        // Register of user actions over predictions.
        Schema::create('analytics_prediction_actions', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('predictionid');
            $table->unsignedBigInteger('userid');
            $table->string('actionname', 255);
            $table->integer('timecreated');

            // Indexes
            $table->index(['predictionid', 'userid', 'actionname'], 'predictionidanduseridandactionname');

            // Foreign Keys
            $table->foreign('predictionid')->references('id')->on('analytics_predictions');
            $table->foreign('userid')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('analytics_prediction_actions');
    }
};
