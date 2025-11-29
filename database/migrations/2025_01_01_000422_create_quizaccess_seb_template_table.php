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
        // Templates for Safe Exam Browser configuration.
        Schema::create('quizaccess_seb_template', function (Blueprint $table) {
            $table->id('id');
            $table->string('name', 255)->comment('Name of the template');
            $table->text('description');
            $table->text('content')->comment('Content of the template');
            $table->boolean('enabled');
            $table->integer('sortorder');
            $table->unsignedBigInteger('usermodified')->default(0);
            $table->integer('timecreated')->default(0);
            $table->integer('timemodified')->default(0);

            // Foreign Keys
            $table->foreign('usermodified')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quizaccess_seb_template');
    }
};
