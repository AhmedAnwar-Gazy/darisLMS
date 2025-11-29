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
        // Configuration table for the Rubric grading strategy
        Schema::create('workshopform_rubric_config', function (Blueprint $table) {
            $table->id('id');
            $table->integer('workshopid')->comment('The id of workshop this configuartion applies for');
            $table->string('layout', 30)->nullable()->default('list')->comment('How should the rubric be displayed for reviewers');

            // Unique Indexes
            $table->unique(['workshopid'], 'uqfk_workshop');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workshopform_rubric_config');
    }
};
