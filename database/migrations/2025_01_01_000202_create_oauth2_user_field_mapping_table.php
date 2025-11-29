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
        // Mapping of oauth user fields to moodle fields.
        Schema::create('oauth2_user_field_mapping', function (Blueprint $table) {
            $table->id('id');
            $table->integer('timemodified')->comment('The time this record was modified');
            $table->integer('timecreated')->comment('The time this record was created.');
            $table->unsignedBigInteger('usermodified')->comment('The user who modified this record.');
            $table->unsignedBigInteger('issuerid')->comment('The oauth issuer.');
            $table->text('externalfield')->comment('The fieldname returned by the userinfo endpoint.');
            $table->string('internalfield', 64)->comment('The name of the Moodle field this user field maps to.');

            // Unique Indexes
            $table->unique(['issuerid', 'internalfield'], 'uniqinternal');

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
        Schema::dropIfExists('oauth2_user_field_mapping');
    }
};
