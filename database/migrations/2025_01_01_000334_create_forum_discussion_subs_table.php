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
        // Users may choose to subscribe and unsubscribe from specific discussions.
        Schema::create('forum_discussion_subs', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('forum');
            $table->unsignedBigInteger('userid');
            $table->unsignedBigInteger('discussion');
            $table->integer('preference')->default(1);

            // Unique Indexes
            $table->unique(['userid', 'discussion'], 'user_discussions');

            // Foreign Keys
            $table->foreign('forum')->references('id')->on('forum');
            $table->foreign('userid')->references('id')->on('users');
            $table->foreign('discussion')->references('id')->on('forum_discussions');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('forum_discussion_subs');
    }
};
