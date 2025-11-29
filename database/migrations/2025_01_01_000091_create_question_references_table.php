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
        // Records where a specific question is used.
        Schema::create('question_references', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('usingcontextid')->default(0)->comment('Context where question is used.');
            $table->string('component', 100)->nullable()->comment('Component (e.g. mod_quiz or core_question)');
            $table->string('questionarea', 50)->nullable()->comment('Depending on the component, which area the question is used in (e.g. slot for quiz).');
            $table->integer('itemid')->nullable()->comment('Plugin specific id (e.g. slotid for quiz) where its used.');
            $table->unsignedBigInteger('questionbankentryid')->default(0)->comment('ID of the question bank entry this question is part of.');
            $table->integer('version')->nullable()->comment('Version number for the question where NULL means use the latest non-draft version.');

            // Unique Indexes
            $table->unique(['usingcontextid', 'component', 'questionarea', 'itemid'], 'context-component-area-itemid');

            // Foreign Keys
            $table->foreign('usingcontextid')->references('id')->on('context');
            $table->foreign('questionbankentryid')->references('id')->on('question_bank_entries');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('question_references');
    }
};
