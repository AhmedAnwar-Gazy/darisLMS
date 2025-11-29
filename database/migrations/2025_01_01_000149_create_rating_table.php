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
        // moodle ratings
        Schema::create('rating', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('contextid');
            $table->string('component', 100);
            $table->string('ratingarea', 50);
            $table->integer('itemid');
            $table->unsignedBigInteger('scaleid');
            $table->integer('rating');
            $table->unsignedBigInteger('userid');
            $table->integer('timecreated');
            $table->integer('timemodified');

            // Indexes
            $table->index(['component', 'ratingarea', 'contextid', 'itemid'], 'uniqueuserrating');

            // Foreign Keys
            $table->foreign('contextid')->references('id')->on('context');
            $table->foreign('userid')->references('id')->on('users');
            $table->foreign('scaleid')->references('id')->on('scale');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rating');
    }
};
