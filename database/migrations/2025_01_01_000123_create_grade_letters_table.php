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
        // Repository for grade letters, for courses and other moodle entities that use grades.
        Schema::create('grade_letters', function (Blueprint $table) {
            $table->id('id');
            $table->integer('contextid')->comment('What contextid does this letter apply to (for now these will always be courses, but later...)');
            $table->decimal('lowerboundary', 10, 5)->comment('The lower boundary of the letter. Its upper boundary is the lower boundary of the next highest letter, unless there is none above, in which case it\'s grademax for that grade_item.');
            $table->string('letter', 255)->comment('The display value of the letter. Can be any character or string of characters (OK, A, 10% etc..)');

            // Unique Indexes
            $table->unique(['contextid', 'lowerboundary', 'letter'], 'contextid-lowerboundary-letter');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grade_letters');
    }
};
