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
        // This table stores block instances. The type of block this is is given by the blockname column. The places this block instance appears is controlled by the parentcontexid, showinsubcontexts, pagetypepattern and subpagepattern fields. Where the block appears on the page (by default) is controlled by the defaultposition and defaultweight columns. The block\'s own configuration is stored serialized in configdata.
        Schema::create('block_instances', function (Blueprint $table) {
            $table->id('id');
            $table->string('blockname', 40)->comment('The type of block this is. Foreign key, references block.name.');
            $table->unsignedBigInteger('parentcontextid')->comment('The context within which this block appears. Foreign key, references context.id.');
            $table->smallInteger('showinsubcontexts')->comment('If 1, this block appears on all matching pages in subcontexts of parentcontextid, as well in pages belonging to parentcontextid.');
            $table->smallInteger('requiredbytheme')->default(0)->comment('If 1, this block was created because it was required by the theme and did not exist.');
            $table->string('pagetypepattern', 64)->comment('The types of page this block appears on. Either an exact page type like mod-quiz-view, or a pattern like mod-quiz-* or course-view-*. Note that course-view-* will match course-view.');
            $table->string('subpagepattern', 16)->nullable()->comment('Further restrictions on where this block appears. In some places, e.g. during a quiz or lesson attempt, different pages have different subpage ids. If this field is not null, the block only appears on that particular subpage.');
            $table->string('defaultregion', 16)->comment('Which block region this block should appear in on each page, in the absence of a specific position in the block_positions table.');
            $table->integer('defaultweight')->comment('Used to order the blocks within a block region. Again, may be overridden by the block_positions table for a specific page where this block appears.');
            $table->text('configdata')->nullable()->comment('A serialized blob of configuration data for this block instance.');
            $table->integer('timecreated')->comment('Time at which this block instance was originally created');
            $table->integer('timemodified')->comment('Time at which block instance was last modified.');

            // Indexes
            $table->index(['parentcontextid', 'showinsubcontexts', 'pagetypepattern', 'subpagepattern'], 'parentcontextid-showinsubcontexts-pagetypepattern-subpagepattern');
            $table->index(['timemodified'], 'timemodified');
            $table->index(['blockname'], 'blocknameindex');

            // Foreign Keys
            $table->foreign('parentcontextid')->references('id')->on('context');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('block_instances');
    }
};
