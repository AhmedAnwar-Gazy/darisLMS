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
        // Categories are for grouping questions
        Schema::create('question_categories', function (Blueprint $table) {
            $table->id('id');
            $table->string('name', 255);
            $table->integer('contextid')->default(0)->comment('context that this category is shared in');
            $table->text('info');
            $table->tinyInteger('infoformat')->default(0);
            $table->string('stamp', 255);
            $table->unsignedBigInteger('parent')->default(0);
            $table->integer('sortorder')->default(999);
            $table->string('idnumber', 100)->nullable();

            // Indexes
            $table->index(['contextid'], 'contextid');

            // Unique Indexes
            $table->unique(['contextid', 'stamp'], 'contextidstamp');
            $table->unique(['contextid', 'idnumber'], 'contextididnumber');

            // Foreign Keys
            $table->foreign('parent')->references('id')->on('question_categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('question_categories');
    }
};
