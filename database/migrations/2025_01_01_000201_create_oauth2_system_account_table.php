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
        // Stored details used to get an access token as a system user for this oauth2 service.
        Schema::create('oauth2_system_account', function (Blueprint $table) {
            $table->id('id');
            $table->integer('timecreated')->comment('Time this record was created.');
            $table->integer('timemodified')->comment('Time this record was modified.');
            $table->unsignedBigInteger('usermodified')->comment('The user who modified this record.');
            $table->integer('issuerid')->comment('The id of the oauth 2 identity issuer');
            $table->text('refreshtoken')->comment('The refresh token used to request access tokens.');
            $table->text('grantedscopes')->comment('The scopes that this system account has been granted access to.');
            $table->text('email')->nullable()->comment('The email that was connected to this issuer.');
            $table->text('username')->comment('The username that was connected as a system account to this issue.');

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
        Schema::dropIfExists('oauth2_system_account');
    }
};
