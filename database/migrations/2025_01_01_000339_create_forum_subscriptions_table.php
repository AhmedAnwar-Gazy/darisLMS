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
        // Keeps track of who is subscribed to what forum
        Schema::create('forum_subscriptions', function (Blueprint $table) {
            $table->id('id');
            $table->integer('userid')->default(0);
            $table->unsignedBigInteger('forum')->default(0);

            // Indexes
            $table->index(['userid'], 'userid');

            // Unique Indexes
            $table->unique(['userid', 'forum'], 'useridforum');

            // Foreign Keys
            $table->foreign('forum')->references('id')->on('forum');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('forum_subscriptions');
    }
};
