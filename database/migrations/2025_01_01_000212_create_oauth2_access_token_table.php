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
        // Stores access tokens for system accounts in order to be able to use a single token across multiple sessions
        Schema::create('oauth2_access_token', function (Blueprint $table) {
            $table->id('id');
            $table->integer('timecreated')->comment('Time this record was created.');
            $table->integer('timemodified')->comment('Time this record was modified.');
            $table->unsignedBigInteger('usermodified')->comment('The user who modified this record.');
            $table->integer('issuerid')->comment('Corresponding oauth2 issuer');
            $table->text('token')->comment('access token');
            $table->integer('expires')->comment('Expiry timestamp (according to the issuer)');
            $table->text('scope');

            // Unique Indexes
            $table->unique(['issuerid'], 'issueridkey');

            // Foreign Keys
            $table->foreign('usermodified')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('oauth2_access_token');
    }
};
