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
        // Link a competency to a learning plan template.
        Schema::create('competency_templatecomp', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('templateid')->comment('The template this competency is linked to.');
            $table->unsignedBigInteger('competencyid')->comment('The competency that is linked to this course.');
            $table->integer('timecreated')->comment('The time this link was created.');
            $table->integer('timemodified')->comment('The time this link was modified.');
            $table->unsignedBigInteger('usermodified')->comment('The user who modified this link.');
            $table->integer('sortorder')->nullable()->comment('Relative sort order');

            // Foreign Keys
            $table->foreign('templateid')->references('id')->on('competency_template');
            $table->foreign('competencyid')->references('id')->on('competency');
            $table->foreign('usermodified')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('competency_templatecomp');
    }
};
