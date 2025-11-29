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
        // Stores wiki pages synonyms
        Schema::create('wiki_synonyms', function (Blueprint $table) {
            $table->id('id');
            $table->integer('subwikiid')->default(0)->comment('Subwiki instance');
            $table->integer('pageid')->default(0)->comment('Original page');
            $table->string('pagesynonym', 255)->default('Pagesynonym')->comment('Page name synonym');

            // Unique Indexes
            $table->unique(['pageid', 'pagesynonym'], 'pageidsyn');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wiki_synonyms');
    }
};
