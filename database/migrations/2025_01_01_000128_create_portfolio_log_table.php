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
        // log of portfolio transfers (used to later check for duplicates)
        Schema::create('portfolio_log', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('userid')->comment('user who exported content');
            $table->integer('time')->comment('time of transfer (in the case of a queued transfer this is the time the actual transfer ran, not when the user started)');
            $table->unsignedBigInteger('portfolio')->comment('fk to portfolio_instance');
            $table->string('caller_class', 150)->comment('the name of the class used to create the transfer');
            $table->string('caller_file', 255)->comment('path to file to include where the class definition lives. (relative to dirroot)');
            $table->string('caller_component', 255)->nullable()->comment('the component name responsible for exporting');
            $table->string('caller_sha1', 255)->comment('sha1 of exported content as far as the caller is concerned (before the portfolio plugin gets a hold of it)');
            $table->unsignedBigInteger('tempdataid')->default(0)->comment('old id from portfolio_tempdata.  This is so that we can gracefully catch a race condition between an external system requesting a file and causing the tempdata to be deleted, before the user gets the "your transfer is requested" page');
            $table->string('returnurl', 255)->comment('the original "returnurl" of the export - takes us to the moodle page we started from');
            $table->string('continueurl', 255)->comment('the url the external system has set to view the transfer');

            // Foreign Keys
            $table->foreign('userid')->references('id')->on('users');
            $table->foreign('portfolio')->references('id')->on('portfolio_instance');
            $table->foreign('tempdataid')->references('id')->on('portfolio_tempdata');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('portfolio_log');
    }
};
