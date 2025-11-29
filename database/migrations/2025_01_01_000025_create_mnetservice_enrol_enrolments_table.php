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
        // Caches the information about enrolments of our local users in courses on remote hosts
        Schema::create('mnetservice_enrol_enrolments', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('hostid')->comment('ID of the remote MNet host');
            $table->unsignedBigInteger('userid')->comment('ID of our local user on this server');
            $table->integer('remotecourseid')->comment('ID of the course at  the remote server. Note that this may and may not be cached in our mnetservice_enrol_courses table, depends of whether the course is opened for remote enrolments or our student is the enrolled there via other plugin');
            $table->string('rolename', 255);
            $table->integer('enroltime')->default(0);
            $table->string('enroltype', 20)->comment('The name of the enrol plugin at the remote server that was used to enrol our student into their course');

            // Foreign Keys
            $table->foreign('userid')->references('id')->on('users');
            $table->foreign('hostid')->references('id')->on('mnet_host');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mnetservice_enrol_enrolments');
    }
};
