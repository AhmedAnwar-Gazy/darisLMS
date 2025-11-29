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
        // search_simpledb table containing the index data.
        Schema::create('search_simpledb_index', function (Blueprint $table) {
            $table->id('id');
            $table->string('docid', 255);
            $table->integer('itemid');
            $table->text('title')->nullable();
            $table->text('content')->nullable();
            $table->integer('contextid');
            $table->string('areaid', 255);
            $table->boolean('type');
            $table->integer('courseid');
            $table->integer('owneruserid')->nullable();
            $table->integer('modified');
            $table->integer('userid')->nullable();
            $table->text('description1')->nullable();
            $table->text('description2')->nullable();

            // Indexes
            $table->index(['owneruserid', 'contextid'], 'owneruserid-contextid');
            $table->index(['contextid'], 'contextid');
            $table->index(['courseid'], 'courseid');
            $table->index(['areaid'], 'areaid');

            // Unique Indexes
            $table->unique(['docid'], 'docid');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('search_simpledb_index');
    }
};
