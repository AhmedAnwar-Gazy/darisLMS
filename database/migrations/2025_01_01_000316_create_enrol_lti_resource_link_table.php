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
        // Each row represents a resource link for a platform and deployment
        Schema::create('enrol_lti_resource_link', function (Blueprint $table) {
            $table->id('id');
            $table->string('resourcelinkid', 255)->comment('The platform-and-deployment-unique id of the resource link');
            $table->unsignedBigInteger('ltideploymentid')->comment('The id of the enrol_lti_deployment record containing the deployment information.');
            $table->integer('resourceid')->comment('The id of the local enrol_lti_tools record containing information about the published resource to which this resource link relates.');
            $table->unsignedBigInteger('lticontextid')->nullable()->comment('The id of the enrol_lti_context record containing information about the context from which this resource link originates.');
            $table->text('lineitemsservice')->nullable()->comment('The URL for the line items service for this resource link');
            $table->text('lineitemservice')->nullable()->comment('The URL for the line item service (if only one line item present).');
            $table->string('lineitemscope', 255)->nullable()->comment('The ags line items authorization scope');
            $table->string('resultscope', 255)->nullable()->comment('The ags result authorization scope');
            $table->string('scorescope', 255)->nullable()->comment('The ags score items authorization scope');
            $table->text('contextmembershipsurl')->nullable()->comment('The NRPS membership URL');
            $table->string('nrpsserviceversions', 255)->nullable()->comment('The NRPS supported service versions');
            $table->integer('timecreated');
            $table->integer('timemodified');

            // Unique Indexes
            $table->unique(['resourcelinkid', 'ltideploymentid'], 'resourcelinkid-ltideploymentid');

            // Foreign Keys
            $table->foreign('ltideploymentid')->references('id')->on('enrol_lti_deployment');
            $table->foreign('lticontextid')->references('id')->on('enrol_lti_context');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enrol_lti_resource_link');
    }
};
