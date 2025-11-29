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
        // Defines lesson_grades
        Schema::create('lesson_grades', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('lessonid')->default(0);
            $table->integer('userid')->default(0);
            $table->string('grade')->default(0);
            $table->tinyInteger('late')->default(0);
            $table->integer('completed')->default(0);

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
        Schema::dropIfExists('lesson_grades');
    }
};
