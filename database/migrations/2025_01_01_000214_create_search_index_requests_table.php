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
        // Records requests for (re)indexing of specific contexts. Entries will be removed from this table when indexing of that context is complete. (This table is not used for normal time-based indexing of new content.)
        Schema::create('search_index_requests', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('contextid')->comment('Context ID that has been requested for reindexing.');
            $table->string('searcharea', 255)->comment('Set (e.g. \'forum-post\') if a specific area is to be reindexed. Blank indicates all areas.');
            $table->integer('timerequested')->comment('Time at which this index update was requested.');
            $table->string('partialarea', 255)->comment('If processing of this context partially completed, set to the area that needs processing next. Blank indicates not processed yet.');
            $table->integer('partialtime')->comment('If processing partially completed, set to the timestamp within the next area where processing should start. 0 indicates not processed yet.');
            $table->integer('indexpriority')->comment('Priority value so that important requests can be dealt with first; higher numbers are processed first');

            // Indexes
            $table->index(['indexpriority', 'timerequested'], 'indexprioritytimerequested');

            // Foreign Keys
            $table->foreign('contextid')->references('id')->on('context');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('search_index_requests');
    }
};
