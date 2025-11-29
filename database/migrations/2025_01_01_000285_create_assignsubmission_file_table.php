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
        // Info about file submissions for assignments
        Schema::create('assignsubmission_file', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('assignment')->default(0);
            $table->unsignedBigInteger('submission')->default(0);
            $table->integer('numfiles')->default(0)->comment('The number of files the student submitted.');

            // Foreign Keys
            $table->foreign('assignment')->references('id')->on('assign');
            $table->foreign('submission')->references('id')->on('assign_submission');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assignsubmission_file');
    }
};
