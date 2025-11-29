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
        // External blog links used for RSS copying of blog entries to Moodle user blogs
        Schema::create('blog_external', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('userid');
            $table->string('name', 255);
            $table->text('description')->nullable();
            $table->text('url');
            $table->string('filtertags', 255)->nullable()->comment('Comma-separated list of tags that will be used to filter which entries are copied over from the external blog. They refer to existing tags in the external blog.');
            $table->boolean('failedlastsync')->default(0)->comment('Whether or not the last sync failed for some reason');
            $table->integer('timemodified')->nullable();
            $table->integer('timefetched')->default(0);

            // Foreign Keys
            $table->foreign('userid')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog_external');
    }
};
