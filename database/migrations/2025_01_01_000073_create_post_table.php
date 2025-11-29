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
        // Generic post table to hold data blog entries etc in different modules
        Schema::create('post', function (Blueprint $table) {
            $table->id('id');
            $table->string('module', 20);
            $table->integer('userid')->default(0);
            $table->unsignedBigInteger('courseid')->default(0);
            $table->integer('groupid')->default(0);
            $table->integer('moduleid')->default(0);
            $table->unsignedBigInteger('coursemoduleid')->default(0);
            $table->string('subject', 128);
            $table->text('summary')->nullable();
            $table->text('content')->nullable();
            $table->string('uniquehash', 255);
            $table->integer('rating')->default(0);
            $table->integer('format')->default(0);
            $table->tinyInteger('summaryformat')->default(0);
            $table->string('attachment', 100)->nullable()->comment('attachment');
            $table->string('publishstate', 20)->default('draft');
            $table->integer('lastmodified')->default(0);
            $table->integer('created')->default(0);
            $table->unsignedBigInteger('usermodified')->nullable();

            // Indexes
            $table->index(['lastmodified'], 'lastmodified');
            $table->index(['module'], 'module');
            $table->index(['subject'], 'subject');

            // Unique Indexes
            $table->unique(['id', 'userid'], 'id-userid');

            // Foreign Keys
            $table->foreign('usermodified')->references('id')->on('users');
            $table->foreign('courseid')->references('id')->on('course');
            $table->foreign('coursemoduleid')->references('id')->on('course_modules');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post');
    }
};
