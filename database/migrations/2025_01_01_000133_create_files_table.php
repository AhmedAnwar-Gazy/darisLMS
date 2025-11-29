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
        // description of files, content is stored in sha1 file pool
        Schema::create('files', function (Blueprint $table) {
            $table->id('id');
            $table->string('contenthash', 40)->comment('sha1 hash of file content');
            $table->string('pathnamehash', 40)->comment('complete file path sha1 hash - unique for each file');
            $table->unsignedBigInteger('contextid')->comment('The context id defined in context table - identifies the instance of plugin owning the file');
            $table->string('component', 100)->comment('Full name of the component owning the area');
            $table->string('filearea', 50)->comment('Like "coursefiles". "submission", "intro" and "content" (images and swf linked from summaries), etc.');
            $table->integer('itemid')->comment('Optional - some plugin specific item id (eg. forum post, blog entry or assignment submission, user id for user files)');
            $table->string('filepath', 255)->comment('Optional - relative path to file from module content root, useful in Scorm and Resource mod - most of the mods do not need this');
            $table->string('filename', 255)->comment('The full Unicode name of this file (case sensitive) - some chars are not allowed though');
            $table->unsignedBigInteger('userid')->nullable()->comment('Optional - general userid field - meaning depending on plugin');
            $table->integer('filesize');
            $table->string('mimetype', 100)->nullable()->comment('type of file - jpeg image, open document spreadsheet');
            $table->integer('status')->default(0)->comment('number greater than 0 means something is wrong with this file (virus, missing, etc.)');
            $table->text('source')->nullable()->comment('contains the reference if the file is imported from external sites');
            $table->string('author', 255)->nullable()->comment('The original author of the file');
            $table->string('license', 255)->nullable()->comment('license of the file to guide reuse');
            $table->integer('timecreated');
            $table->integer('timemodified');
            $table->integer('sortorder')->default(0)->comment('order of files');
            $table->unsignedBigInteger('referencefileid')->nullable()->comment('Use to indicate file is a proxy for repository file');

            // Indexes
            $table->index(['component', 'filearea', 'contextid', 'itemid'], 'component-filearea-contextid-itemid');
            $table->index(['contenthash'], 'contenthash');
            $table->index(['license'], 'license');
            $table->index(['filename'], 'filename');

            // Unique Indexes
            $table->unique(['pathnamehash'], 'pathnamehash');

            // Foreign Keys
            $table->foreign('contextid')->references('id')->on('context');
            $table->foreign('userid')->references('id')->on('users');
            $table->foreign('referencefileid')->references('id')->on('files_reference');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('files');
    }
};
