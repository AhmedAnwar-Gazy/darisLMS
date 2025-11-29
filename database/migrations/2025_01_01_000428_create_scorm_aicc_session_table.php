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
        // Used by AICC HACP to store session information
        Schema::create('scorm_aicc_session', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('userid')->default(0)->comment('id from user table');
            $table->unsignedBigInteger('scormid')->default(0)->comment('id from scorm table');
            $table->string('hacpsession', 255)->comment('sessionid used to authenticate AICC HACP communication');
            $table->integer('scoid')->nullable()->default(0)->comment('id from scorm_scoes table');
            $table->string('scormmode', 50)->nullable();
            $table->string('scormstatus', 255)->nullable();
            $table->integer('attempt')->nullable();
            $table->string('lessonstatus', 255)->nullable();
            $table->string('sessiontime', 255)->nullable();
            $table->integer('timecreated')->default(0)->comment('time this session was created');
            $table->integer('timemodified')->default(0)->comment('time this session was last used');

            // Foreign Keys
            $table->foreign('scormid')->references('id')->on('scorm');
            $table->foreign('userid')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scorm_aicc_session');
    }
};
