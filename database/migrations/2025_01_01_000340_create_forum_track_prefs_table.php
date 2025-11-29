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
        // Tracks each users untracked forums
        Schema::create('forum_track_prefs', function (Blueprint $table) {
            $table->id('id');
            $table->integer('userid')->default(0);
            $table->integer('forumid')->default(0);

            // Indexes
            $table->index(['userid', 'forumid'], 'userid-forumid');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('forum_track_prefs');
    }
};
