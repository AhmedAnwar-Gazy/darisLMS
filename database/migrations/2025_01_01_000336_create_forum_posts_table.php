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
        // All posts are stored in this table
        Schema::create('forum_posts', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('discussion')->default(0);
            $table->unsignedBigInteger('parent')->default(0);
            $table->integer('userid')->default(0);
            $table->integer('created')->default(0);
            $table->integer('modified')->default(0);
            $table->tinyInteger('mailed')->default(0);
            $table->string('subject', 255);
            $table->text('message');
            $table->tinyInteger('messageformat')->default(0);
            $table->tinyInteger('messagetrust')->default(0);
            $table->string('attachment', 100);
            $table->smallInteger('totalscore')->default(0);
            $table->integer('mailnow')->default(0);
            $table->boolean('deleted')->default(0);
            $table->integer('privatereplyto')->default(0);
            $table->bigInteger('wordcount')->nullable();
            $table->bigInteger('charcount')->nullable();

            // Indexes
            $table->index(['userid'], 'userid');
            $table->index(['created'], 'created');
            $table->index(['mailed'], 'mailed');
            $table->index(['privatereplyto'], 'privatereplyto');

            // Foreign Keys
            $table->foreign('discussion')->references('id')->on('forum_discussions');
            $table->foreign('parent')->references('id')->on('forum_posts');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('forum_posts');
    }
};
