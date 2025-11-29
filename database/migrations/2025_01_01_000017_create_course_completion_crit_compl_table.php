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
        // Course completion user records
        Schema::create('course_completion_crit_compl', function (Blueprint $table) {
            $table->id('id');
            $table->integer('userid')->default(0);
            $table->integer('course')->default(0);
            $table->integer('criteriaid')->default(0)->comment('Completion criteria this references');
            $table->decimal('gradefinal', 10, 5)->nullable()->comment('The final grade for the course (included regardless of whether a passing grade was required)');
            $table->integer('unenroled')->nullable()->comment('Timestamp when the user was unenroled');
            $table->integer('timecompleted')->nullable();

            // Indexes
            $table->index(['userid'], 'userid');
            $table->index(['course'], 'course');
            $table->index(['criteriaid'], 'criteriaid');
            $table->index(['timecompleted'], 'timecompleted');

            // Unique Indexes
            $table->unique(['userid', 'course', 'criteriaid'], 'useridcoursecriteriaid');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_completion_crit_compl');
    }
};
