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
        // A tool proxy between moodle and a consumer
        Schema::create('enrol_lti_lti2_tool_proxy', function (Blueprint $table) {
            $table->id('id');
            $table->string('toolproxykey', 32);
            $table->unsignedBigInteger('consumerid');
            $table->text('toolproxy');
            $table->integer('created');
            $table->integer('updated');

            // Unique Indexes
            $table->unique(['toolproxykey'], 'toolproxykey_uniq');

            // Foreign Keys
            $table->foreign('consumerid')->references('id')->on('enrol_lti_lti2_consumer');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enrol_lti_lti2_tool_proxy');
    }
};
