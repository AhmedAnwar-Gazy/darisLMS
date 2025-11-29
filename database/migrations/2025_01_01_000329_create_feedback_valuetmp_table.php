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
        // values of the completedstmp
        Schema::create('feedback_valuetmp', function (Blueprint $table) {
            $table->id('id');
            $table->integer('course_id')->default(0);
            $table->unsignedBigInteger('item')->default(0);
            $table->integer('completed')->default(0);
            $table->integer('tmp_completed')->default(0);
            $table->text('value');

            // Indexes
            $table->index(['course_id'], 'course_id');

            // Unique Indexes
            $table->unique(['completed', 'item', 'course_id'], 'completed_item');

            // Foreign Keys
            $table->foreign('item')->references('id')->on('feedback_item');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feedback_valuetmp');
    }
};
