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
        // Areas that have been checked for accessibility problems
        Schema::create('tool_brickfield_areas', function (Blueprint $table) {
            $table->id('id');
            $table->tinyInteger('type')->default(0);
            $table->unsignedBigInteger('contextid')->nullable();
            $table->string('component', 100)->nullable();
            $table->string('tablename', 40)->nullable();
            $table->string('fieldorarea', 50)->nullable();
            $table->integer('itemid')->nullable();
            $table->text('filename')->nullable();
            $table->string('reftable', 40)->nullable();
            $table->integer('refid')->nullable();
            $table->unsignedBigInteger('cmid')->nullable();
            $table->unsignedBigInteger('courseid')->nullable();
            $table->unsignedBigInteger('categoryid')->nullable();

            // Indexes
            $table->index(['courseid', 'cmid'], 'coursecm');
            $table->index(['type', 'tablename', 'itemid', 'fieldorarea'], 'tablefield');
            $table->index(['type', 'contextid', 'component', 'fieldorarea', 'itemid'], 'file');
            $table->index(['reftable', 'refid', 'type'], 'reftable');

            // Foreign Keys
            $table->foreign('courseid')->references('id')->on('course');
            $table->foreign('cmid')->references('id')->on('course_modules');
            $table->foreign('categoryid')->references('id')->on('course_categories');
            $table->foreign('contextid')->references('id')->on('context');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tool_brickfield_areas');
    }
};
