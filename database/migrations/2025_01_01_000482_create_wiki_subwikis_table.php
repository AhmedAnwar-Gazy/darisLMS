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
        // Stores subwiki instances
        Schema::create('wiki_subwikis', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('wikiid')->default(0)->comment('Wiki activity');
            $table->integer('groupid')->default(0)->comment('Group that owns this wiki');
            $table->integer('userid')->default(0)->comment('Owner of that subwiki');

            // Unique Indexes
            $table->unique(['wikiid', 'groupid', 'userid'], 'wikiidgroupiduserid');

            // Foreign Keys
            $table->foreign('wikiid')->references('id')->on('wiki');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wiki_subwikis');
    }
};
