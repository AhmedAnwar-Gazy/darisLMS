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
        // Keeps track of user mail delivery preferences for each forum
        Schema::create('forum_digests', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('userid');
            $table->unsignedBigInteger('forum');
            $table->boolean('maildigest')->default(-1);

            // Unique Indexes
            $table->unique(['forum', 'userid', 'maildigest'], 'forumdigest');

            // Foreign Keys
            $table->foreign('userid')->references('id')->on('users');
            $table->foreign('forum')->references('id')->on('forum');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('forum_digests');
    }
};
