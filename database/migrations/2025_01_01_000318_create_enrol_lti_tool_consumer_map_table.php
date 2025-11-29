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
        // Table that maps the published tool to tool consumers.
        Schema::create('enrol_lti_tool_consumer_map', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('toolid')->comment('The tool ID.');
            $table->unsignedBigInteger('consumerid')->comment('The consumer ID.');

            // Foreign Keys
            $table->foreign('toolid')->references('id')->on('enrol_lti_tools');
            $table->foreign('consumerid')->references('id')->on('enrol_lti_lti2_consumer');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enrol_lti_tool_consumer_map');
    }
};
