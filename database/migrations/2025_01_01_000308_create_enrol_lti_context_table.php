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
        // Each row represents a context in the platform, where resource links are added within a deployment.
        Schema::create('enrol_lti_context', function (Blueprint $table) {
            $table->id('id');
            $table->string('contextid', 255)->comment('The id of the context on the platform');
            $table->unsignedBigInteger('ltideploymentid')->comment('The id of the enrol_lti_deployment record containing the deployment information.');
            $table->text('type')->nullable()->comment('The type of the context on the platform');
            $table->integer('timecreated');
            $table->integer('timemodified');

            // Unique Indexes
            $table->unique(['ltideploymentid', 'contextid'], 'ltideploymentid-contextid');

            // Foreign Keys
            $table->foreign('ltideploymentid')->references('id')->on('enrol_lti_deployment');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enrol_lti_context');
    }
};
