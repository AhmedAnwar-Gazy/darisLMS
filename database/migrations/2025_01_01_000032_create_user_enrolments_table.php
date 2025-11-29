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
        // Users participating in courses (aka enrolled users) - everybody who is participating/visible in course, that means both teachers and students
        Schema::create('user_enrolments', function (Blueprint $table) {
            $table->id('id');
            $table->integer('status')->default(0)->comment('0..9 are system constants, 0 means active participation, see ENROL_PARTICIPATION_* constants, plugins may define own status greater than 10');
            $table->unsignedBigInteger('enrolid');
            $table->unsignedBigInteger('userid');
            $table->integer('timestart')->default(0);
            $table->integer('timeend')->default(2147483647);
            $table->unsignedBigInteger('modifierid')->default(0);
            $table->integer('timecreated')->default(0);
            $table->integer('timemodified')->default(0);

            // Unique Indexes
            $table->unique(['enrolid', 'userid'], 'enrolid-userid');

            // Foreign Keys
            $table->foreign('enrolid')->references('id')->on('enrol');
            $table->foreign('userid')->references('id')->on('users');
            $table->foreign('modifierid')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_enrolments');
    }
};
