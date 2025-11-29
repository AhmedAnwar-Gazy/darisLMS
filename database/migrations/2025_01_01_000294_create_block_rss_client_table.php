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
        // Remote news feed information. Contains the news feed id, the userid of the user who added the feed, the title of the feed itself and a description of the feed contents along with the url used to access the remote feed. Preferredtitle is a field for future use - intended to allow for custom titles rather than those found in the feed
        Schema::create('block_rss_client', function (Blueprint $table) {
            $table->id('id');
            $table->integer('userid')->default(0);
            $table->text('title');
            $table->string('preferredtitle', 64);
            $table->text('description');
            $table->tinyInteger('shared')->default(0);
            $table->string('url', 255);
            $table->integer('skiptime')->default(0)->comment('How many seconds skip this feed for (increases every time it fails, resets to 0 when it succeeds)');
            $table->integer('skipuntil')->default(0)->comment('Do not query this RSS feed again until this time');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('block_rss_client');
    }
};
