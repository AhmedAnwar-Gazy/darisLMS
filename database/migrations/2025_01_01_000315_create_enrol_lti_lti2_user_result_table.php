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
        // Results for each user for each resource link
        Schema::create('enrol_lti_lti2_user_result', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('resourcelinkid');
            $table->string('ltiuserkey', 255);
            $table->text('ltiresultsourcedid');
            $table->integer('created');
            $table->integer('updated');

            // Foreign Keys
            $table->foreign('resourcelinkid')->references('id')->on('enrol_lti_lti2_resource_link');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enrol_lti_lti2_user_result');
    }
};
