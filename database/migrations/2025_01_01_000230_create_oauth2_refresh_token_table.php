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
        // Stores refresh tokens which can be exchanged for access tokens
        Schema::create('oauth2_refresh_token', function (Blueprint $table) {
            $table->id('id');
            $table->integer('timecreated')->comment('Time this record was created.');
            $table->integer('timemodified')->comment('Time this record was modified.');
            $table->unsignedBigInteger('userid')->comment('The user to whom this refresh token belongs.');
            $table->unsignedBigInteger('issuerid')->comment('Corresponding oauth2 issuer');
            $table->text('token')->comment('refresh token');
            $table->string('scopehash', 40)->comment('sha1 hash of the scopes used when requesting the refresh token');

            // Unique Indexes
            $table->unique(['userid', 'issuerid', 'scopehash'], 'userid-issuerid-scopehash');

            // Foreign Keys
            $table->foreign('issuerid')->references('id')->on('oauth2_issuer');
            $table->foreign('userid')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('oauth2_refresh_token');
    }
};
