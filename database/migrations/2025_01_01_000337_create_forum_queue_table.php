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
        // For keeping track of posts that will be mailed in digest form
        Schema::create('forum_queue', function (Blueprint $table) {
            $table->id('id');
            $table->integer('userid')->default(0);
            $table->unsignedBigInteger('discussionid')->default(0);
            $table->unsignedBigInteger('postid')->default(0);
            $table->integer('timemodified')->default(0)->comment('The modified time of the original post');

            // Indexes
            $table->index(['userid'], 'user');

            // Foreign Keys
            $table->foreign('discussionid')->references('id')->on('forum_discussions');
            $table->foreign('postid')->references('id')->on('forum_posts');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('forum_queue');
    }
};
