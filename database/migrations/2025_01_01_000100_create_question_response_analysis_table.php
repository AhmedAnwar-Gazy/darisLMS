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
        // Analysis of student responses given to questions.
        Schema::create('question_response_analysis', function (Blueprint $table) {
            $table->id('id');
            $table->string('hashcode', 40)->comment('sha1 hash of serialized qubaids_condition class. Unique for every combination of class name and property.');
            $table->string('whichtries', 255);
            $table->integer('timemodified');
            $table->unsignedBigInteger('questionid');
            $table->integer('variant')->nullable();
            $table->string('subqid', 100);
            $table->string('aid', 100)->nullable();
            $table->text('response')->nullable();
            $table->decimal('credit', 15, 5);

            // Foreign Keys
            $table->foreign('questionid')->references('id')->on('question');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('question_response_analysis');
    }
};
