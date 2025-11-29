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
        // Table to store infected file details.
        Schema::create('infected_files', function (Blueprint $table) {
            $table->id('id');
            $table->text('filename')->comment('Original file name');
            $table->text('quarantinedfile')->nullable()->comment('Quarantine zip file');
            $table->unsignedBigInteger('userid')->comment('The user that uploaded the infected file.');
            $table->text('reason')->comment('The reason for the antivirus failure');
            $table->integer('timecreated')->default(0)->comment('The time the infected file was uploaded.');

            // Foreign Keys
            $table->foreign('userid')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('infected_files');
    }
};
