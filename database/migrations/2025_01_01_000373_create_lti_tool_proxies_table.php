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
        // LTI tool proxy registrations
        Schema::create('lti_tool_proxies', function (Blueprint $table) {
            $table->id('id');
            $table->string('name', 255)->default('Tool Provider')->comment('Tool Provider name');
            $table->text('regurl')->nullable();
            $table->tinyInteger('state')->default(1)->comment('Configured = 1, Pending = 2, Accepted = 3, Rejected = 4, Cancelled = 5');
            $table->string('guid', 255)->nullable();
            $table->string('secret', 255)->nullable();
            $table->string('vendorcode', 255)->nullable();
            $table->text('capabilityoffered')->comment('List of capabilities offered, one per line');
            $table->text('serviceoffered')->comment('List of services offered, one per line');
            $table->text('toolproxy')->nullable()->comment('JSON string representing tool proxy returned by tool provider');
            $table->integer('createdby')->comment('ID of user which initiated the registration process');
            $table->integer('timecreated')->comment('Date/time at which the record was created');
            $table->integer('timemodified')->comment('Date/time at which the record was last modified');

            // Unique Indexes
            $table->unique(['guid'], 'guid');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lti_tool_proxies');
    }
};
