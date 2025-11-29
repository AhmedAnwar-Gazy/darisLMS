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
        // Link a competency to a module.
        Schema::create('competency_modulecomp', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('cmid')->comment('ID of the record in the course_modules table.');
            $table->integer('timecreated')->comment('The time this record was created.');
            $table->integer('timemodified')->comment('The time this record was last modified');
            $table->unsignedBigInteger('usermodified')->comment('The user who last modified this field.');
            $table->integer('sortorder')->comment('The field used to naturally sort this link.');
            $table->unsignedBigInteger('competencyid')->comment('The course competency this activity is linked to.');
            $table->tinyInteger('ruleoutcome')->comment('The outcome when an activity is completed.');
            $table->boolean('overridegrade')->default(0)->comment('Enables the ability to override an existing competencys grade.');

            // Indexes
            $table->index(['cmid', 'ruleoutcome'], 'cmidruleoutcome');

            // Unique Indexes
            $table->unique(['cmid', 'competencyid'], 'cmidcompetencyid');

            // Foreign Keys
            $table->foreign('cmid')->references('id')->on('course_modules');
            $table->foreign('competencyid')->references('id')->on('competency');
            $table->foreign('usermodified')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('competency_modulecomp');
    }
};
