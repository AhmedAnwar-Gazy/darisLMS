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
        // Tracks each users read posts
        Schema::create('forum_read', function (Blueprint $table) {
            $table->id('id');
            $table->integer('userid')->default(0);
            $table->integer('forumid')->default(0);
            $table->integer('discussionid')->default(0);
            $table->integer('postid')->default(0);
            $table->integer('firstread')->default(0);
            $table->integer('lastread')->default(0);

            // Indexes
            $table->index(['forumid', 'userid'], 'forumid-userid');
            $table->index(['discussionid', 'userid'], 'discussionid-userid');
            $table->index(['postid', 'userid'], 'postid-userid');
            $table->index(['userid'], 'userid');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('forum_read');
    }
};
