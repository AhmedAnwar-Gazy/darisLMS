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
        // Stored indicator calculations
        Schema::create('analytics_indicator_calc', function (Blueprint $table) {
            $table->id('id');
            $table->integer('starttime');
            $table->integer('endtime');
            $table->unsignedBigInteger('contextid');
            $table->string('sampleorigin', 255);
            $table->integer('sampleid');
            $table->string('indicator', 255);
            $table->decimal('value', 10, 2)->nullable()->comment('The calculated value, it can be null.');
            $table->integer('timecreated');

            // Indexes
            $table->index(['starttime', 'endtime', 'contextid'], 'starttime-endtime-contextid');

            // Foreign Keys
            $table->foreign('contextid')->references('id')->on('context');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('analytics_indicator_calc');
    }
};
