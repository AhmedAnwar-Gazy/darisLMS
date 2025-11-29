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
        // table to cache results from analysis done in statistics report for quizzes.
        Schema::create('quiz_statistics', function (Blueprint $table) {
            $table->id('id');
            $table->string('hashcode', 40)->comment('sha1 hash of serialized qubaids_condition class. Unique for every combination of class name and property.');
            $table->smallInteger('whichattempts')->comment('bool used to indicate whether these stats are for all attempts or just for the first.');
            $table->integer('timemodified');
            $table->integer('firstattemptscount');
            $table->integer('highestattemptscount');
            $table->integer('lastattemptscount');
            $table->integer('allattemptscount');
            $table->decimal('firstattemptsavg', 15, 5)->nullable();
            $table->decimal('highestattemptsavg', 15, 5)->nullable();
            $table->decimal('lastattemptsavg', 15, 5)->nullable();
            $table->decimal('allattemptsavg', 15, 5)->nullable();
            $table->decimal('median', 15, 5)->nullable();
            $table->decimal('standarddeviation', 15, 5)->nullable();
            $table->decimal('skewness', 15, 10)->nullable();
            $table->decimal('kurtosis', 15, 5)->nullable();
            $table->decimal('cic', 15, 10)->nullable();
            $table->decimal('errorratio', 15, 10)->nullable();
            $table->decimal('standarderror', 15, 10)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quiz_statistics');
    }
};
