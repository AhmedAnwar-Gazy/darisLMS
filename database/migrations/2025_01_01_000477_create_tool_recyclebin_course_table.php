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
        // A list of items in the course recycle bin
        Schema::create('tool_recyclebin_course', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('courseid');
            $table->integer('section');
            $table->integer('module');
            $table->string('name', 255)->nullable();
            $table->integer('timecreated')->default(0);

            // Indexes
            $table->index(['timecreated'], 'timecreated');

            // Foreign Keys
            $table->foreign('courseid')->references('id')->on('course');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tool_recyclebin_course');
    }
};
