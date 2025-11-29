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
        // Information about a specific LTI contexts from the consumers
        Schema::create('enrol_lti_lti2_context', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('consumerid');
            $table->string('lticontextkey', 255);
            $table->string('type', 100)->nullable();
            $table->text('settings')->nullable();
            $table->integer('created');
            $table->integer('updated');

            // Foreign Keys
            $table->foreign('consumerid')->references('id')->on('enrol_lti_lti2_consumer');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enrol_lti_lti2_context');
    }
};
