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
        // Associations of blog entries with courses and module instances
        Schema::create('blog_association', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('contextid');
            $table->unsignedBigInteger('blogid');

            // Foreign Keys
            $table->foreign('contextid')->references('id')->on('context');
            $table->foreign('blogid')->references('id')->on('post');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog_association');
    }
};
