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
        // all glossary entries
        Schema::create('glossary_entries', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('glossaryid')->default(0);
            $table->integer('userid')->default(0);
            $table->string('concept', 255);
            $table->text('definition');
            $table->tinyInteger('definitionformat')->default(0);
            $table->tinyInteger('definitiontrust')->default(0);
            $table->string('attachment', 100);
            $table->integer('timecreated')->default(0);
            $table->integer('timemodified')->default(0);
            $table->tinyInteger('teacherentry')->default(0);
            $table->integer('sourceglossaryid')->default(0);
            $table->tinyInteger('usedynalink')->default(1);
            $table->tinyInteger('casesensitive')->default(0);
            $table->tinyInteger('fullmatch')->default(1);
            $table->tinyInteger('approved')->default(1);

            // Indexes
            $table->index(['userid'], 'userid');
            $table->index(['concept'], 'concept');

            // Foreign Keys
            $table->foreign('glossaryid')->references('id')->on('glossary');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glossary_entries');
    }
};
