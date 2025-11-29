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
        // Table to represent a report schedule
        Schema::create('reportbuilder_schedule', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('reportid')->default(0);
            $table->string('name', 255);
            $table->boolean('enabled')->default(1);
            $table->text('audiences');
            $table->string('format', 255);
            $table->string('subject', 255);
            $table->text('message');
            $table->integer('messageformat');
            $table->unsignedBigInteger('userviewas')->default(0);
            $table->integer('timescheduled')->default(0);
            $table->integer('recurrence')->default(0);
            $table->integer('reportempty')->default(0);
            $table->integer('timelastsent')->default(0);
            $table->integer('timenextsend')->default(0);
            $table->unsignedBigInteger('usercreated')->default(0);
            $table->unsignedBigInteger('usermodified')->default(0);
            $table->integer('timecreated')->default(0);
            $table->integer('timemodified')->default(0);

            // Foreign Keys
            $table->foreign('reportid')->references('id')->on('reportbuilder_report');
            $table->foreign('userviewas')->references('id')->on('users');
            $table->foreign('usercreated')->references('id')->on('users');
            $table->foreign('usermodified')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reportbuilder_schedule');
    }
};
