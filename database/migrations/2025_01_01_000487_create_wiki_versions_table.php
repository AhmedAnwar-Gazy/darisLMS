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
        // Stores wiki page history
        Schema::create('wiki_versions', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('pageid')->default(0)->comment('Page id');
            $table->text('content')->comment('Not parsed wiki content');
            $table->string('contentformat', 20)->default('creole')->comment('Markup used to write content');
            $table->smallInteger('version')->default(0)->comment('Wiki page version');
            $table->integer('timecreated')->default(0)->comment('Page edition timestamp');
            $table->integer('userid')->default(0)->comment('Edition autor');

            // Foreign Keys
            $table->foreign('pageid')->references('id')->on('wiki_pages');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wiki_versions');
    }
};
