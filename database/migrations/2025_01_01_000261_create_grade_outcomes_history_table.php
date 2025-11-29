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
        // History table
        Schema::create('grade_outcomes_history', function (Blueprint $table) {
            $table->id('id');
            $table->integer('action')->default(0)->comment('created/modified/deleted constants');
            $table->unsignedBigInteger('oldid');
            $table->string('source', 255)->nullable()->comment('What caused the modification? manual/module/import/...');
            $table->integer('timemodified')->nullable()->comment('The last time this grade_item was modified');
            $table->unsignedBigInteger('loggeduser')->nullable()->comment('the userid of the person who last modified this outcome');
            $table->unsignedBigInteger('courseid')->nullable()->comment('Mostly these are defined site wide ie NULL');
            $table->string('shortname', 255)->comment('The short name or code for this outcome statement');
            $table->text('fullname')->comment('The full description of the outcome (usually 1 sentence)');
            $table->unsignedBigInteger('scaleid')->nullable()->comment('The recommended scale for this outcome.');
            $table->text('description')->nullable()->comment('Outcome description');
            $table->tinyInteger('descriptionformat')->default(0);

            // Indexes
            $table->index(['action'], 'action');
            $table->index(['timemodified'], 'timemodified');

            // Foreign Keys
            $table->foreign('oldid')->references('id')->on('grade_outcomes');
            $table->foreign('courseid')->references('id')->on('course');
            $table->foreign('scaleid')->references('id')->on('scale');
            $table->foreign('loggeduser')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grade_outcomes_history');
    }
};
