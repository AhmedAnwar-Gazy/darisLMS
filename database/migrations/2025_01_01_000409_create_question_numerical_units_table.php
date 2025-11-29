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
        // Optional unit options for numerical questions. This table is also used by the calculated question type.
        Schema::create('question_numerical_units', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('question')->default(0)->comment('Foreign key references question.id');
            $table->decimal('multiplier', 38, 19)->default(1.00000000000000000000)->comment('The multiplier for this unit. For example, if the first unit is (1.0, \'cm\'), another unit might be (0.1, \'mm\') or (100.0, \'m\').');
            $table->string('unit', 50)->comment('The unit. For example \'m\' or \'kg\'.');

            // Unique Indexes
            $table->unique(['question', 'unit'], 'question-unit');

            // Foreign Keys
            $table->foreign('question')->references('id')->on('question');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('question_numerical_units');
    }
};
