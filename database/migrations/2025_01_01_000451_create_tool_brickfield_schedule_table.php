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
        // Keeps the per course content analysis schedule.
        Schema::create('tool_brickfield_schedule', function (Blueprint $table) {
            $table->id('id');
            $table->integer('contextlevel')->default(50)->comment('The context level for this item. Defaults to CONTEXT_COURSE.');
            $table->integer('instanceid')->comment('The id of the specific context instance. Course id for courses.');
            $table->integer('contextid')->nullable()->comment('Id of the specific context record.');
            $table->tinyInteger('status')->default(0)->comment('The schedule status for this item. 0 = not requested; 1 = requested; 2 = analyzed.');
            $table->integer('timeanalyzed')->nullable()->default(0)->comment('The most recent time the item was analyzed by scheduler.');
            $table->integer('timemodified')->nullable()->default(0)->comment('Time stamp of the last record update.');

            // Indexes
            $table->index(['status'], 'statusidx');

            // Unique Indexes
            $table->unique(['contextlevel', 'instanceid'], 'courseidx');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tool_brickfield_schedule');
    }
};
