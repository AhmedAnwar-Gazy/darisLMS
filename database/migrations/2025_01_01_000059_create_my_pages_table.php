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
        // Extra user pages for the My Moodle system
        Schema::create('my_pages', function (Blueprint $table) {
            $table->id('id');
            $table->integer('userid')->nullable()->default(0)->comment('The user who owns this page or 0 for system defaults');
            $table->string('name', 200)->comment('The page name (freeform text)');
            $table->boolean('private')->default(1)->comment('Whether or not the page is private (dashboard) or public (profile)');
            $table->integer('sortorder')->default(0)->comment('The order of the pages for a user');

            // Indexes
            $table->index(['userid', 'private'], 'user_idx');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('my_pages');
    }
};
