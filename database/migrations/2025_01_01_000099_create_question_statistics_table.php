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
        // Statistics for individual questions used in an activity.
        Schema::create('question_statistics', function (Blueprint $table) {
            $table->id('id');
            $table->string('hashcode', 40)->comment('sha1 hash of serialized qubaids_condition class. Unique for every combination of class name and property.');
            $table->integer('timemodified');
            $table->unsignedBigInteger('questionid');
            $table->integer('slot')->nullable()->comment('The position in the quiz where this question appears');
            $table->smallInteger('subquestion');
            $table->integer('variant')->nullable();
            $table->integer('s')->default(0);
            $table->decimal('effectiveweight', 15, 5)->nullable();
            $table->tinyInteger('negcovar')->default(0);
            $table->decimal('discriminationindex', 15, 5)->nullable();
            $table->decimal('discriminativeefficiency', 15, 5)->nullable();
            $table->decimal('sd', 15, 10)->nullable();
            $table->decimal('facility', 15, 10)->nullable();
            $table->text('subquestions')->nullable();
            $table->decimal('maxmark', 12, 7)->nullable();
            $table->text('positions')->nullable()->comment('positions in which this item appears. Only used for random questions.');
            $table->decimal('randomguessscore', 12, 7)->nullable()->comment('An estimate of the score a student would get by guessing randomly.');

            // Foreign Keys
            $table->foreign('questionid')->references('id')->on('question');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('question_statistics');
    }
};
