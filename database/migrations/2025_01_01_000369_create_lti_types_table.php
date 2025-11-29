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
        // Basic LTI pre-configured activities
        Schema::create('lti_types', function (Blueprint $table) {
            $table->id('id');
            $table->string('name', 255)->default('basiclti Activity')->comment('Activity name');
            $table->text('baseurl');
            $table->string('tooldomain', 255);
            $table->tinyInteger('state')->default(2)->comment('Active = 1, Pending = 2, Rejected = 3');
            $table->integer('course');
            $table->boolean('coursevisible')->default(0);
            $table->string('ltiversion', 10);
            $table->string('clientid', 255)->nullable();
            $table->integer('toolproxyid')->nullable()->comment('Primary key of related tool proxy (null for LTI 1 tools)');
            $table->text('enabledcapability')->nullable()->comment('Enabled capabilities, one per line (null for LTI 1 tools)');
            $table->text('parameter')->nullable()->comment('Launch parameters, one per line (null for LTI 1 tools)');
            $table->text('icon')->nullable()->comment('URL to icon file');
            $table->text('secureicon')->nullable()->comment('Secure URL to icon file');
            $table->integer('createdby');
            $table->integer('timecreated');
            $table->integer('timemodified');
            $table->text('description')->nullable()->comment('A description of what this LTI module is.');

            // Indexes
            $table->index(['course'], 'course');
            $table->index(['tooldomain'], 'tooldomain');

            // Unique Indexes
            $table->unique(['clientid'], 'clientid');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lti_types');
    }
};
