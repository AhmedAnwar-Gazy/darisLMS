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
        // Stores the overall grade for each user on the quiz, based on their various attempts and the quiz.grademethod setting.
        Schema::create('quiz_grades', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('quiz')->default(0)->comment('Foreign key references quiz.id.');
            $table->integer('userid')->default(0)->comment('Foreign key references user.id.');
            $table->decimal('grade', 10, 5)->default(0)->comment('The overall grade from the quiz. Not affected by overrides in the gradebook.');
            $table->integer('timemodified')->default(0)->comment('The last time this grade changed.');

            // Indexes
            $table->index(['userid'], 'userid');

            // Foreign Keys
            $table->foreign('quiz')->references('id')->on('quiz');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quiz_grades');
    }
};
