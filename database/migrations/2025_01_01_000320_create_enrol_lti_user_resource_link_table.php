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
        // Join table mapping users to resource links as this is a many:many relationship
        Schema::create('enrol_lti_user_resource_link', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('ltiuserid')->comment('The id of the enrol_lti_users record');
            $table->unsignedBigInteger('resourcelinkid')->comment('The id of the enrol_lti_resource_link record.');

            // Unique Indexes
            $table->unique(['ltiuserid', 'resourcelinkid'], 'ltiuserid-resourcelinkid');

            // Foreign Keys
            $table->foreign('ltiuserid')->references('id')->on('enrol_lti_users');
            $table->foreign('resourcelinkid')->references('id')->on('enrol_lti_resource_link');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enrol_lti_user_resource_link');
    }
};
