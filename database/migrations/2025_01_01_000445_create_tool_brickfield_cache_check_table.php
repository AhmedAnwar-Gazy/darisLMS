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
        // Contains accessibility summary information per check.
        Schema::create('tool_brickfield_cache_check', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('courseid');
            $table->boolean('status')->nullable();
            $table->integer('checkid')->nullable();
            $table->integer('checkcount')->nullable();
            $table->integer('errorcount')->nullable();

            // Indexes
            $table->index(['status'], 'status');
            $table->index(['errorcount'], 'errorcount');

            // Foreign Keys
            $table->foreign('courseid')->references('id')->on('course');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tool_brickfield_cache_check');
    }
};
