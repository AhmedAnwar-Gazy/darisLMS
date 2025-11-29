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
        // H5Pactivities_attempts tracking info
        Schema::create('h5pactivity_attempts_results', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('attemptid')->comment('h5pactivity_attempts ID');
            $table->string('subcontent', 128)->nullable();
            $table->integer('timecreated');
            $table->string('interactiontype', 128)->nullable();
            $table->text('description')->nullable();
            $table->text('correctpattern')->nullable()->comment('Correct Pattern in xAPI format');
            $table->text('response')->comment('User response data in xAPI format');
            $table->text('additionals')->nullable()->comment('Extra subcontent information in JSON format');
            $table->integer('rawscore')->default(0);
            $table->integer('maxscore')->default(0);
            $table->integer('duration')->nullable()->default(0)->comment('Seconds inverted in this result (exctracted directly from statement)');
            $table->boolean('completion')->nullable()->comment('Store the xAPI tracking completion result.');
            $table->boolean('success')->nullable()->comment('Store the xAPI tracking success result.');

            // Indexes
            $table->index(['attemptid', 'timecreated'], 'attemptid-timecreated');

            // Foreign Keys
            $table->foreign('attemptid')->references('id')->on('h5pactivity_attempts');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('h5pactivity_attempts_results');
    }
};
