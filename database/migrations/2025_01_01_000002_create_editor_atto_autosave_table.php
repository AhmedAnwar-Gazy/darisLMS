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
        // Draft text that is auto-saved every 5 seconds while an editor is open.
        Schema::create('editor_atto_autosave', function (Blueprint $table) {
            $table->id('id');
            $table->string('elementid', 255)->comment('The unique id for the text editor in the form.');
            $table->integer('contextid')->comment('The contextid that the form was loaded with.');
            $table->string('pagehash', 64)->comment('The HTML DOM id of the page that loaded the form.');
            $table->integer('userid')->comment('The id of the user that loaded the form.');
            $table->text('drafttext')->comment('The draft text');
            $table->integer('draftid')->nullable()->comment('Optional draft area id containing draft files.');
            $table->string('pageinstance', 64)->comment('The browser tab instance that last saved the draft text. This is to prevent multiple tabs from the same user saving different text alternately.');
            $table->integer('timemodified')->default(0)->comment('Store the last modified time for the auto save text.');

            // Unique Indexes
            $table->unique(['elementid', 'contextid', 'userid', 'pagehash'], 'autosave_uniq_key');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('editor_atto_autosave');
    }
};
