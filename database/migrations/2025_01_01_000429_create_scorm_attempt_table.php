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
        // List of SCORM attempts made by user.
        Schema::create('scorm_attempt', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('userid');
            $table->unsignedBigInteger('scormid')->comment('The id of the scorm table');
            $table->integer('attempt')->default(1)->comment('The attempt number');

            // Foreign Keys
            $table->foreign('userid')->references('id')->on('users');
            $table->foreign('scormid')->references('id')->on('scorm');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scorm_attempt');
    }
};
