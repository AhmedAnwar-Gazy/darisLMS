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
        // Most recently accessed items accessed by a user
        Schema::create('block_recentlyaccesseditems', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('courseid')->comment('Course id the item belongs to');
            $table->unsignedBigInteger('cmid')->comment('Item course module id');
            $table->unsignedBigInteger('userid')->comment('User id that accessed the item');
            $table->integer('timeaccess')->comment('Time the user accessed the last time an item');

            // Unique Indexes
            $table->unique(['userid', 'courseid', 'cmid'], 'userid-courseid-cmid');

            // Foreign Keys
            $table->foreign('userid')->references('id')->on('users');
            $table->foreign('courseid')->references('id')->on('course');
            $table->foreign('cmid')->references('id')->on('course_modules');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('block_recentlyaccesseditems');
    }
};
