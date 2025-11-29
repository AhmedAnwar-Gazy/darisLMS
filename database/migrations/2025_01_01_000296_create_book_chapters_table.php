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
        // Defines book_chapters
        Schema::create('book_chapters', function (Blueprint $table) {
            $table->id('id');
            $table->integer('bookid')->default(0);
            $table->integer('pagenum')->default(0);
            $table->integer('subchapter')->default(0);
            $table->string('title', 255);
            $table->text('content');
            $table->smallInteger('contentformat')->default(0);
            $table->tinyInteger('hidden')->default(0);
            $table->integer('timecreated')->default(0);
            $table->integer('timemodified')->default(0);
            $table->string('importsrc', 255);

            // Indexes
            $table->index(['bookid'], 'bookid');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_chapters');
    }
};
