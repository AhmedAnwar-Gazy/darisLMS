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
        // Each row represents a deployment of a tool within a platform.
        Schema::create('enrol_lti_deployment', function (Blueprint $table) {
            $table->id('id');
            $table->string('name', 255)->comment('A short name identifying the tool deployment to users');
            $table->string('deploymentid', 255)->comment('The id of the deployment, as defined in the platform');
            $table->unsignedBigInteger('platformid')->comment('The platformid to which this deployment belongs');
            $table->string('legacyconsumerkey', 255)->nullable()->comment('The legacy consumer key mapped to this deployment, if the deployment represents a migrated tool.');
            $table->integer('timecreated');
            $table->integer('timemodified');

            // Unique Indexes
            $table->unique(['platformid', 'deploymentid'], 'platformid-deploymentid');

            // Foreign Keys
            $table->foreign('platformid')->references('id')->on('enrol_lti_app_registration');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enrol_lti_deployment');
    }
};
