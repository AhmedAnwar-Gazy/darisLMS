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
        // Available choices are stored here
        Schema::create('choice', function (Blueprint $table) {
            $table->id('id');
            $table->integer('course')->default(0);
            $table->string('name', 255);
            $table->text('intro');
            $table->smallInteger('introformat')->default(0);
            $table->tinyInteger('publish')->default(0);
            $table->tinyInteger('showresults')->default(0);
            $table->smallInteger('display')->default(0);
            $table->tinyInteger('allowupdate')->default(0);
            $table->tinyInteger('allowmultiple')->default(0);
            $table->tinyInteger('showunanswered')->default(0);
            $table->tinyInteger('includeinactive')->default(1);
            $table->tinyInteger('limitanswers')->default(0);
            $table->integer('timeopen')->default(0);
            $table->integer('timeclose')->default(0);
            $table->tinyInteger('showpreview')->default(0);
            $table->integer('timemodified')->default(0);
            $table->boolean('completionsubmit')->default(0)->comment('If this field is set to 1, then the activity will be automatically marked as \'complete\' once the user submits their choice.');
            $table->boolean('showavailable')->default(0)->comment('If this field is set to 1, then the the number of available space on choice options will be shown, given limitanswers is set to 1.');

            // Indexes
            $table->index(['course'], 'course');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('choice');
    }
};
