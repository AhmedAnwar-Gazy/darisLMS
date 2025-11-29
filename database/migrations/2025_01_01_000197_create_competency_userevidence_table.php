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
        // The evidence of prior learning
        Schema::create('competency_userevidence', function (Blueprint $table) {
            $table->id('id');
            $table->integer('userid');
            $table->string('name', 100);
            $table->text('description');
            $table->boolean('descriptionformat');
            $table->text('url');
            $table->integer('timecreated');
            $table->integer('timemodified');
            $table->unsignedBigInteger('usermodified');

            // Indexes
            $table->index(['userid'], 'userid');

            // Foreign Keys
            $table->foreign('usermodified')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('competency_userevidence');
    }
};
