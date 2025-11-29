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
        Schema::create('auth_lti_linked_login', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('userid')->comment('The user account the LTI user is linked to.');
            $table->text('issuer');
            $table->string('issuer256', 64)->comment('SHA256 hash of the issuer from which the platform user originates.');
            $table->string('sub', 255);
            $table->string('sub256', 64)->comment('SHA256 hash of the subject identifying the user for the issuer.');
            $table->integer('timecreated');
            $table->integer('timemodified');

            // Unique Indexes
            $table->unique(['userid', 'issuer256', 'sub256'], 'unique_key');

            // Foreign Keys
            $table->foreign('userid')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('auth_lti_linked_login');
    }
};
