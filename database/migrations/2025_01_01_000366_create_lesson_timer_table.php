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
        // lesson timer for each lesson
        Schema::create('lesson_timer', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('lessonid')->default(0);
            $table->integer('userid')->default(0);
            $table->integer('starttime')->default(0);
            $table->integer('lessontime')->default(0);
            $table->boolean('completed')->nullable()->default(0);
            $table->integer('timemodifiedoffline')->default(0)->comment('Last modified time via web services (mobile app).');

            // Indexes
            $table->index(['userid'], 'userid');

            // Foreign Keys
            $table->foreign('lessonid')->references('id')->on('lesson');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lesson_timer');
    }
};
