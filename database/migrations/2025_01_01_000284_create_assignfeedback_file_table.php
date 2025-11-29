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
        // Stores info about the number of files submitted by a student.
        Schema::create('assignfeedback_file', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('assignment')->default(0);
            $table->unsignedBigInteger('grade')->default(0);
            $table->integer('numfiles')->default(0)->comment('The number of files uploaded by a grader.');

            // Foreign Keys
            $table->foreign('assignment')->references('id')->on('assign');
            $table->foreign('grade')->references('id')->on('assign_grades');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assignfeedback_file');
    }
};
