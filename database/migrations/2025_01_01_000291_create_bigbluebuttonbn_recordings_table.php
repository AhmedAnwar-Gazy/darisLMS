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
        // The bigbluebuttonbn table to store references to recordings
        Schema::create('bigbluebuttonbn_recordings', function (Blueprint $table) {
            $table->id('id');
            $table->integer('courseid');
            $table->unsignedBigInteger('bigbluebuttonbnid');
            $table->integer('groupid')->nullable();
            $table->string('recordingid', 64);
            $table->boolean('headless')->default(0);
            $table->boolean('imported')->default(0);
            $table->boolean('status')->default(0);
            $table->text('importeddata')->nullable()->comment('This is the remote recording data stored as json and kept for future reference.');
            $table->integer('timecreated')->default(0);
            $table->unsignedBigInteger('usermodified')->default(0);
            $table->integer('timemodified')->default(0);

            // Indexes
            $table->index(['courseid'], 'courseid');
            $table->index(['recordingid'], 'recordingid');

            // Foreign Keys
            $table->foreign('bigbluebuttonbnid')->references('id')->on('bigbluebuttonbn');
            $table->foreign('usermodified')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bigbluebuttonbn_recordings');
    }
};
