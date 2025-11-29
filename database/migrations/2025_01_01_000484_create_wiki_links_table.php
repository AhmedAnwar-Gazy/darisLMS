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
        // Page wiki links
        Schema::create('wiki_links', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('subwikiid')->default(0)->comment('Subwiki instance');
            $table->unsignedBigInteger('frompageid')->default(0)->comment('Page id with a link');
            $table->integer('topageid')->default(0)->comment('Page id that recives a link');
            $table->string('tomissingpage', 255)->nullable()->comment('link to a nonexistent page');

            // Foreign Keys
            $table->foreign('frompageid')->references('id')->on('wiki_pages');
            $table->foreign('subwikiid')->references('id')->on('wiki_subwikis');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wiki_links');
    }
};
