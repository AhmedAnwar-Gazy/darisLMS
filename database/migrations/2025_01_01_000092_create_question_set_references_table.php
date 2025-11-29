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
        // Records where groups of questions are used.
        Schema::create('question_set_references', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('usingcontextid')->default(0)->comment('Context where question is used.');
            $table->string('component', 100)->nullable()->comment('Component (e.g. mod_quiz)');
            $table->string('questionarea', 50)->nullable()->comment('Depending on the component, which area the question is used in (e.g. slot for quiz).');
            $table->integer('itemid')->nullable()->comment('Plugin specific id (e.g. slotid for quiz) where its used.');
            $table->unsignedBigInteger('questionscontextid')->default(0)->comment('Context questions come from.');
            $table->text('filtercondition')->nullable()->comment('Filter expression in json format');

            // Unique Indexes
            $table->unique(['usingcontextid', 'component', 'questionarea', 'itemid'], 'context-component-area-itemid');

            // Foreign Keys
            $table->foreign('usingcontextid')->references('id')->on('context');
            $table->foreign('questionscontextid')->references('id')->on('context');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('question_set_references');
    }
};
