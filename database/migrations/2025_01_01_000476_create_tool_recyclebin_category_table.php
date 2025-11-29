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
        // A list of items in the category recycle bin
        Schema::create('tool_recyclebin_category', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('categoryid');
            $table->string('shortname', 255);
            $table->string('fullname', 255);
            $table->integer('timecreated');

            // Indexes
            $table->index(['timecreated'], 'timecreated');

            // Foreign Keys
            $table->foreign('categoryid')->references('id')->on('course_categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tool_recyclebin_category');
    }
};
