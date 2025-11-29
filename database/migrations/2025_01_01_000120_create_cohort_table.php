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
        // Each record represents one cohort (aka site-wide group).
        Schema::create('cohort', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('contextid')->comment('Context is usually ignored in sync operations so that the cohorts may be moved freely around in the context tree without any side affects.');
            $table->string('name', 254)->comment('Short human readable name for the cohort, does not have to be unique');
            $table->string('idnumber', 100)->nullable()->comment('Unique identifier of a cohort, useful especially for mapping to external entities');
            $table->text('description')->nullable()->comment('Standard description text box');
            $table->tinyInteger('descriptionformat');
            $table->boolean('visible')->default(1)->comment('Visibility to teachers');
            $table->string('component', 100)->comment('Component (plugintype_pluignname) that manages the cohort, manual modifications are allowed only when set to NULL');
            $table->integer('timecreated');
            $table->integer('timemodified');
            $table->string('theme', 50)->nullable();

            // Foreign Keys
            $table->foreign('contextid')->references('id')->on('context');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cohort');
    }
};
