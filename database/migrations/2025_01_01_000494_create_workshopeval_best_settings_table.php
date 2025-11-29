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
        // Settings for the grading evaluation subplugin Comparison with the best assessment.
        Schema::create('workshopeval_best_settings', function (Blueprint $table) {
            $table->id('id');
            $table->integer('workshopid');
            $table->tinyInteger('comparison')->nullable()->default(5)->comment('Here we store the recently set factor of comparison of assessment in the given workshop. Reasonable values are from 1 to 10 or so. Default to 5.');

            // Unique Indexes
            $table->unique(['workshopid'], 'fkuq_workshop');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workshopeval_best_settings');
    }
};
