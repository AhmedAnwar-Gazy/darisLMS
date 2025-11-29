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
        // Defines lesson_pages
        Schema::create('lesson_pages', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('lessonid')->default(0);
            $table->integer('prevpageid')->default(0);
            $table->integer('nextpageid')->default(0);
            $table->tinyInteger('qtype')->default(0);
            $table->tinyInteger('qoption')->default(0);
            $table->tinyInteger('layout')->default(1);
            $table->tinyInteger('display')->default(1);
            $table->integer('timecreated')->default(0);
            $table->integer('timemodified')->default(0);
            $table->string('title', 255);
            $table->text('contents');
            $table->tinyInteger('contentsformat')->default(0);

            // Foreign Keys
            $table->foreign('lessonid')->references('id')->on('lesson');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lesson_pages');
    }
};
