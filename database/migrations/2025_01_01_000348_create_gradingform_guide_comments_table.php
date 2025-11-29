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
        // frequently used comments used in marking guide
        Schema::create('gradingform_guide_comments', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('definitionid')->comment('The ID of the form definition this faq is part of');
            $table->integer('sortorder')->comment('Defines the order of the comments');
            $table->text('description')->nullable()->comment('The comment description');
            $table->tinyInteger('descriptionformat')->nullable()->comment('The format of the description field');

            // Foreign Keys
            $table->foreign('definitionid')->references('id')->on('grading_definitions');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gradingform_guide_comments');
    }
};
