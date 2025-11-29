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
        // Link from the consumer to the tool
        Schema::create('enrol_lti_lti2_resource_link', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('contextid')->nullable();
            $table->unsignedBigInteger('consumerid')->nullable();
            $table->string('ltiresourcelinkkey', 255);
            $table->text('settings')->nullable();
            $table->unsignedBigInteger('primaryresourcelinkid')->nullable();
            $table->boolean('shareapproved')->nullable();
            $table->integer('created');
            $table->integer('updated');

            // Foreign Keys
            $table->foreign('contextid')->references('id')->on('enrol_lti_lti2_context');
            $table->foreign('primaryresourcelinkid')->references('id')->on('enrol_lti_lti2_resource_link');
            $table->foreign('consumerid')->references('id')->on('enrol_lti_lti2_consumer');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enrol_lti_lti2_resource_link');
    }
};
