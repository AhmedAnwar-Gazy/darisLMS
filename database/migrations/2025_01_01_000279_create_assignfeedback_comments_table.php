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
        // Text feedback for submitted assignments
        Schema::create('assignfeedback_comments', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('assignment')->default(0);
            $table->unsignedBigInteger('grade')->default(0);
            $table->text('commenttext')->nullable()->comment('The feedback text');
            $table->smallInteger('commentformat')->default(0)->comment('The feedback text format');

            // Foreign Keys
            $table->foreign('assignment')->references('id')->on('assign');
            $table->foreign('grade')->references('id')->on('assign_grades');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assignfeedback_comments');
    }
};
