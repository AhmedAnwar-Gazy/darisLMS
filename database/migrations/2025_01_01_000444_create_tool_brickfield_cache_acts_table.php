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
        // Contains accessibility summary information per activity.
        Schema::create('tool_brickfield_cache_acts', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('courseid');
            $table->boolean('status')->nullable();
            $table->string('component', 64)->nullable();
            $table->integer('totalactivities')->nullable();
            $table->integer('failedactivities')->nullable();
            $table->integer('passedactivities')->nullable();
            $table->integer('errorcount')->nullable();

            // Indexes
            $table->index(['status'], 'status');

            // Foreign Keys
            $table->foreign('courseid')->references('id')->on('course');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tool_brickfield_cache_acts');
    }
};
