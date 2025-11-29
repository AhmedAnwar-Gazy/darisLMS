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
        // Forums contain and structure discussion
        Schema::create('forum', function (Blueprint $table) {
            $table->id('id');
            $table->integer('course')->default(0);
            $table->string('type', 20)->default('general');
            $table->string('name', 255);
            $table->text('intro');
            $table->smallInteger('introformat')->default(0)->comment('text format of intro field');
            $table->integer('duedate')->default(0)->comment('A due date to show in the calendar. Not used for grading.');
            $table->integer('cutoffdate')->default(0)->comment('The final date after which forum posts will no longer be accepted for this forum.');
            $table->integer('assessed')->default(0);
            $table->integer('assesstimestart')->default(0);
            $table->integer('assesstimefinish')->default(0);
            $table->integer('scale')->default(0);
            $table->integer('grade_forum')->default(0);
            $table->smallInteger('grade_forum_notify')->default(0);
            $table->integer('maxbytes')->default(0);
            $table->integer('maxattachments')->default(1)->comment('Number of attachments allowed per post');
            $table->boolean('forcesubscribe')->default(0);
            $table->tinyInteger('trackingtype')->default(1);
            $table->tinyInteger('rsstype')->default(0);
            $table->tinyInteger('rssarticles')->default(0);
            $table->integer('timemodified')->default(0);
            $table->integer('warnafter')->default(0);
            $table->integer('blockafter')->default(0);
            $table->integer('blockperiod')->default(0);
            $table->integer('completiondiscussions')->default(0)->comment('Nonzero if a certain number of posts are required to mark this forum completed for a user.');
            $table->integer('completionreplies')->default(0)->comment('Nonzero if a certain number of replies are required to mark this forum complete for a user.');
            $table->integer('completionposts')->default(0)->comment('Nonzero if a certain number of posts or replies (total) are required to mark this forum complete for a user.');
            $table->boolean('displaywordcount')->default(0);
            $table->integer('lockdiscussionafter')->default(0);

            // Indexes
            $table->index(['course'], 'course');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('forum');
    }
};
