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
        // Describes the named endpoint for an oauth2 service.
        Schema::create('oauth2_endpoint', function (Blueprint $table) {
            $table->id('id');
            $table->integer('timecreated')->comment('The time this record was created.');
            $table->integer('timemodified')->comment('The time this record was modified.');
            $table->unsignedBigInteger('usermodified')->comment('The user who modified this record.');
            $table->string('name', 255)->comment('The service name.');
            $table->text('url')->comment('The url to the endpoint');
            $table->unsignedBigInteger('issuerid')->comment('The identity provider this service belongs to.');

            // Foreign Keys
            $table->foreign('issuerid')->references('id')->on('oauth2_issuer');
            $table->foreign('usermodified')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('oauth2_endpoint');
    }
};
