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
        // Security tokens for accessing of external services
        Schema::create('external_tokens', function (Blueprint $table) {
            $table->id('id');
            $table->string('token', 128)->comment('security token, aka private access key');
            $table->string('privatetoken', 64)->nullable()->comment('private token, generated at the same time that the token, must be stored safely by the ws client, to be transmitted only via https');
            $table->smallInteger('tokentype')->comment('type of token: 0=permanent, no session; 1=linked to current browser session via sid; 2=permanent, with emulated session');
            $table->unsignedBigInteger('userid')->comment('owner of the token');
            $table->unsignedBigInteger('externalserviceid');
            $table->string('sid', 128)->nullable()->comment('link to browser or emulated session');
            $table->unsignedBigInteger('contextid')->comment('context id where in token valid');
            $table->unsignedBigInteger('creatorid')->default(1)->comment('user id of the token creator (useful to know when the administrator created a token and so display the token to a specific administrator)');
            $table->string('iprestriction', 255)->nullable()->comment('ip restriction');
            $table->integer('validuntil')->nullable()->comment('timestampt - valid until data');
            $table->integer('timecreated')->comment('created timestamp');
            $table->integer('lastaccess')->nullable()->comment('last access timestamp');
            $table->string('name', 255)->nullable()->comment('token name, used to identify the token at the table view');

            // Indexes
            $table->index(['token'], 'token');
            $table->index(['sid'], 'sid');

            // Foreign Keys
            $table->foreign('userid')->references('id')->on('users');
            $table->foreign('externalserviceid')->references('id')->on('external_services');
            $table->foreign('contextid')->references('id')->on('context');
            $table->foreign('creatorid')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('external_tokens');
    }
};
