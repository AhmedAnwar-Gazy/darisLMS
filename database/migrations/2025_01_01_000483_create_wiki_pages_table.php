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
        // Stores wiki pages
        Schema::create('wiki_pages', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('subwikiid')->default(0)->comment('Subwiki instance of this page');
            $table->string('title', 255)->default('title')->comment('Page name');
            $table->text('cachedcontent')->comment('Cache wiki content');
            $table->integer('timecreated')->default(0)->comment('Wiki page creation timestamp');
            $table->integer('timemodified')->default(0)->comment('page edition timestamp');
            $table->integer('timerendered')->default(0)->comment('Last render timestamp');
            $table->integer('userid')->default(0)->comment('Edition author');
            $table->integer('pageviews')->default(0)->comment('Number of page views');
            $table->boolean('readonly')->default(0)->comment('Read only flag');

            // Unique Indexes
            $table->unique(['subwikiid', 'title', 'userid'], 'subwikititleuser');

            // Foreign Keys
            $table->foreign('subwikiid')->references('id')->on('wiki_subwikis');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wiki_pages');
    }
};
