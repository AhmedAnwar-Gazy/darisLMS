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
        // This table stores the definition of one version of a question.
        Schema::create('question', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('parent')->default(0);
            $table->string('name', 255);
            $table->text('questiontext');
            $table->tinyInteger('questiontextformat')->default(0);
            $table->text('generalfeedback')->comment('to store the question feedback');
            $table->tinyInteger('generalfeedbackformat')->default(0);
            $table->decimal('defaultmark', 12, 7)->default(1);
            $table->decimal('penalty', 12, 7)->default(0.3333333);
            $table->string('qtype', 20);
            $table->integer('length')->default(1);
            $table->string('stamp', 255);
            $table->integer('timecreated')->default(0)->comment('time question was created');
            $table->integer('timemodified')->default(0)->comment('time that question was last modified');
            $table->unsignedBigInteger('createdby')->nullable()->comment('userid of person who created this question');
            $table->unsignedBigInteger('modifiedby')->nullable()->comment('userid of person who last edited this question');

            // Indexes
            $table->index(['qtype'], 'qtype');

            // Foreign Keys
            $table->foreign('parent')->references('id')->on('question');
            $table->foreign('createdby')->references('id')->on('users');
            $table->foreign('modifiedby')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('question');
    }
};
