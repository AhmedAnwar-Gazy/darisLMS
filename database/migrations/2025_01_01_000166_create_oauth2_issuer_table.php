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
        // Details for an oauth 2 connect identity issuer.
        Schema::create('oauth2_issuer', function (Blueprint $table) {
            $table->id('id');
            $table->integer('timecreated')->comment('Time this record was created.');
            $table->integer('timemodified')->comment('Time this record was modified.');
            $table->integer('usermodified')->comment('The user who modified this record');
            $table->string('name', 255)->comment('The name of this identity issuer');
            $table->text('image');
            $table->text('baseurl')->comment('The base url to the issuer');
            $table->text('clientid')->comment('The client id used to connect to this oauth2 service.');
            $table->text('clientsecret')->comment('The secret used to connect to this oauth2 service.');
            $table->text('loginscopes')->comment('The scopes requested for a normal login attempt.');
            $table->text('loginscopesoffline')->comment('The scopes requested for a login attempt to generate a refresh token.');
            $table->text('loginparams')->comment('Additional parameters sent for a login attempt.');
            $table->text('loginparamsoffline')->comment('Additional parameters sent for a login attempt to generate a refresh token.');
            $table->text('alloweddomains')->comment('Allowed domains for this issuer.');
            $table->text('scopessupported')->nullable()->comment('The list of scopes this service supports.');
            $table->tinyInteger('enabled')->default(1);
            $table->tinyInteger('showonloginpage')->default(1);
            $table->tinyInteger('basicauth')->default(0)->comment('Use HTTP Basic authentication scheme when sending client ID and password');
            $table->integer('sortorder')->comment('The defined sort order.');
            $table->tinyInteger('requireconfirmation')->default(1);
            $table->string('servicetype', 255)->nullable()->comment('Issuer service type, such as \'google\' or \'facebook\'.');
            $table->string('loginpagename', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('oauth2_issuer');
    }
};
