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
        // Each record is one resource and its config data
        Schema::create('resource', function (Blueprint $table) {
            $table->id('id');
            $table->integer('course')->default(0);
            $table->string('name', 255);
            $table->text('intro')->nullable();
            $table->smallInteger('introformat')->default(0);
            $table->smallInteger('tobemigrated')->default(0);
            $table->smallInteger('legacyfiles')->default(0);
            $table->integer('legacyfileslast')->nullable();
            $table->smallInteger('display')->default(0);
            $table->text('displayoptions')->nullable();
            $table->smallInteger('filterfiles')->default(0);
            $table->integer('revision')->default(0)->comment('incremented when after each file changes, solves browser caching issues');
            $table->integer('timemodified')->default(0);

            // Indexes
            $table->index(['course'], 'course');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resource');
    }
};
