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
        // Forums are composed of discussions
        Schema::create('forum_discussions', function (Blueprint $table) {
            $table->id('id');
            $table->integer('course')->default(0);
            $table->unsignedBigInteger('forum')->default(0);
            $table->string('name', 255);
            $table->integer('firstpost')->default(0);
            $table->integer('userid')->default(0);
            $table->integer('groupid')->default(-1);
            $table->boolean('assessed')->default(1);
            $table->integer('timemodified')->default(0);
            $table->unsignedBigInteger('usermodified')->default(0);
            $table->integer('timestart')->default(0);
            $table->integer('timeend')->default(0);
            $table->boolean('pinned')->default(0);
            $table->integer('timelocked')->default(0);

            // Indexes
            $table->index(['userid'], 'userid');
            $table->index(['course'], 'course');

            // Foreign Keys
            $table->foreign('forum')->references('id')->on('forum');
            $table->foreign('usermodified')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('forum_discussions');
    }
};
