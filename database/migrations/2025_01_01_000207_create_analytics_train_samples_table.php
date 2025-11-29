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
        // Samples used for training
        Schema::create('analytics_train_samples', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('modelid');
            $table->integer('analysableid');
            $table->string('timesplitting', 255);
            $table->text('sampleids');
            $table->integer('timecreated')->default(0);

            // Indexes
            $table->index(['modelid', 'analysableid', 'timesplitting'], 'modelidandanalysableidandtimesplitting');

            // Foreign Keys
            $table->foreign('modelid')->references('id')->on('analytics_models');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('analytics_train_samples');
    }
};
