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
        // Each record is one SURVEY module with its configuration
        Schema::create('survey', function (Blueprint $table) {
            $table->id('id');
            $table->integer('course')->default(0);
            $table->integer('template')->default(0);
            $table->integer('days')->default(0);
            $table->integer('timecreated')->default(0);
            $table->integer('timemodified')->default(0);
            $table->string('name', 255);
            $table->text('intro');
            $table->smallInteger('introformat')->default(0)->comment('intro text field format');
            $table->string('questions', 255);
            $table->boolean('completionsubmit')->default(0)->comment('If this field is set to 1, then the activity will be automatically marked as \'complete\' once the user submits the survey.');

            // Indexes
            $table->index(['course'], 'course');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('survey');
    }
};
