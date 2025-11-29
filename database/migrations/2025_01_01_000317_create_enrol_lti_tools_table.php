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
        // List of tools provided to the remote system
        Schema::create('enrol_lti_tools', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('enrolid');
            $table->unsignedBigInteger('contextid');
            $table->string('ltiversion', 15)->default('LTI-1p3');
            $table->string('institution', 40);
            $table->string('lang', 30)->default('en');
            $table->string('timezone', 100)->default(99);
            $table->integer('maxenrolled')->default(0);
            $table->tinyInteger('maildisplay')->default(2);
            $table->string('city', 120);
            $table->string('country', 2);
            $table->boolean('gradesync')->default(0);
            $table->boolean('gradesynccompletion')->default(0);
            $table->boolean('membersync')->default(0);
            $table->boolean('membersyncmode')->default(0);
            $table->integer('roleinstructor');
            $table->integer('rolelearner');
            $table->text('secret')->nullable();
            $table->string('uuid', 36)->nullable();
            $table->tinyInteger('provisioningmodelearner')->nullable();
            $table->tinyInteger('provisioningmodeinstructor')->nullable();
            $table->integer('timecreated');
            $table->integer('timemodified');

            // Unique Indexes
            $table->unique(['uuid'], 'uuid');

            // Foreign Keys
            $table->foreign('enrolid')->references('id')->on('enrol');
            $table->foreign('contextid')->references('id')->on('context');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enrol_lti_tools');
    }
};
