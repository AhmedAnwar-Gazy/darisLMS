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
        // List of competency frameworks.
        Schema::create('competency_framework', function (Blueprint $table) {
            $table->id('id');
            $table->string('shortname', 100)->nullable()->comment('Short name for the competency framework.');
            $table->unsignedBigInteger('contextid');
            $table->string('idnumber', 100)->nullable()->comment('Unique idnumber for this competency framework.');
            $table->text('description')->nullable()->comment('Description of this competency framework');
            $table->smallInteger('descriptionformat')->default(0)->comment('The format of the description field');
            $table->unsignedBigInteger('scaleid')->nullable()->comment('Scale used to define competency.');
            $table->text('scaleconfiguration')->comment('Scale information.');
            $table->tinyInteger('visible')->default(1)->comment('Used to show/hide this competency framework.');
            $table->string('taxonomies', 255)->comment('Sequence of terms to use for each competency level.');
            $table->integer('timecreated')->comment('The time this competency framework was created.');
            $table->integer('timemodified')->comment('The time this competency framework was last modified.');
            $table->unsignedBigInteger('usermodified')->nullable()->comment('The user who last modified this framework');

            // Unique Indexes
            $table->unique(['idnumber'], 'idnumber');

            // Foreign Keys
            $table->foreign('contextid')->references('id')->on('context');
            $table->foreign('scaleid')->references('id')->on('scale');
            $table->foreign('usermodified')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('competency_framework');
    }
};
