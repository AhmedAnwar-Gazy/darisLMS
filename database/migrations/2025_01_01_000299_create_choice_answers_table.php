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
        // choices performed by users
        Schema::create('choice_answers', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('choiceid')->default(0);
            $table->integer('userid')->default(0);
            $table->unsignedBigInteger('optionid')->default(0);
            $table->integer('timemodified')->default(0);

            // Indexes
            $table->index(['userid'], 'userid');

            // Foreign Keys
            $table->foreign('choiceid')->references('id')->on('choice');
            $table->foreign('optionid')->references('id')->on('choice_options');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('choice_answers');
    }
};
