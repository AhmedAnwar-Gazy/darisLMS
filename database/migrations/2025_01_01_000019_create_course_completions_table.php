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
        // Course completion records
        Schema::create('course_completions', function (Blueprint $table) {
            $table->id('id');
            $table->integer('userid')->default(0);
            $table->integer('course')->default(0);
            $table->integer('timeenrolled')->default(0);
            $table->integer('timestarted')->default(0);
            $table->integer('timecompleted')->nullable();
            $table->integer('reaggregate')->default(0);

            // Indexes
            $table->index(['userid'], 'userid');
            $table->index(['course'], 'course');
            $table->index(['timecompleted'], 'timecompleted');

            // Unique Indexes
            $table->unique(['userid', 'course'], 'useridcourse');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_completions');
    }
};
