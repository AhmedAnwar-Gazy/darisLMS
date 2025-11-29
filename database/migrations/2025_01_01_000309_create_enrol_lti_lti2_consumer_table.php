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
        // LTI consumers interacting with moodle
        Schema::create('enrol_lti_lti2_consumer', function (Blueprint $table) {
            $table->id('id');
            $table->string('name', 50);
            $table->string('consumerkey256', 255);
            $table->text('consumerkey')->nullable();
            $table->text('secret');
            $table->string('ltiversion', 10)->nullable();
            $table->string('consumername', 255)->nullable();
            $table->string('consumerversion', 255)->nullable();
            $table->text('consumerguid')->nullable();
            $table->text('profile')->nullable();
            $table->text('toolproxy')->nullable();
            $table->text('settings')->nullable();
            $table->boolean('protected');
            $table->boolean('enabled');
            $table->integer('enablefrom')->nullable();
            $table->integer('enableuntil')->nullable();
            $table->integer('lastaccess')->nullable();
            $table->integer('created');
            $table->integer('updated');

            // Unique Indexes
            $table->unique(['consumerkey256'], 'consumerkey256_uniq');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enrol_lti_lti2_consumer');
    }
};
