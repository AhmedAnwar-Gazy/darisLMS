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
        // Nonce used for authentication between moodle and a consumer
        Schema::create('enrol_lti_lti2_nonce', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('consumerid');
            $table->string('value', 64);
            $table->integer('expires');

            // Foreign Keys
            $table->foreign('consumerid')->references('id')->on('enrol_lti_lti2_consumer');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enrol_lti_lti2_nonce');
    }
};
