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
        // Accounts linked to a users Moodle account.
        Schema::create('auth_oauth2_linked_login', function (Blueprint $table) {
            $table->id('id');
            $table->integer('timecreated');
            $table->integer('timemodified');
            $table->unsignedBigInteger('usermodified');
            $table->unsignedBigInteger('userid')->comment('The user account this oauth login is linked to.');
            $table->unsignedBigInteger('issuerid');
            $table->string('username', 255)->comment('The external username to map to this moodle account');
            $table->text('email')->comment('The external email to map to this moodle account');
            $table->string('confirmtoken', 64)->comment('If this is not empty - the user has not confirmed their email to create the link.');
            $table->integer('confirmtokenexpires')->nullable();

            // Indexes
            $table->index(['issuerid', 'username'], 'search_index');

            // Unique Indexes
            $table->unique(['userid', 'issuerid', 'username'], 'uniq_key');

            // Foreign Keys
            $table->foreign('usermodified')->references('id')->on('users');
            $table->foreign('userid')->references('id')->on('users');
            $table->foreign('issuerid')->references('id')->on('oauth2_issuer');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('auth_oauth2_linked_login');
    }
};
