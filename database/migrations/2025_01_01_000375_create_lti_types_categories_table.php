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
        // Link LTI types to course categories
        Schema::create('lti_types_categories', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('typeid');
            $table->unsignedBigInteger('categoryid');

            // Foreign Keys
            $table->foreign('typeid')->references('id')->on('lti_types');
            $table->foreign('categoryid')->references('id')->on('course_categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lti_types_categories');
    }
};
