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
        // tag_instance table holds the information of associations between tags and other items
        Schema::create('tag_instance', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('tagid');
            $table->string('component', 100)->comment('Defines the Moodle component which the tag was added to');
            $table->string('itemtype', 100);
            $table->integer('itemid');
            $table->unsignedBigInteger('contextid')->nullable()->comment('The context id of the item that was tagged');
            $table->integer('tiuserid')->default(0);
            $table->integer('ordering')->nullable()->comment('Maintains the order of the tag instances of an item');
            $table->integer('timecreated')->default(0);
            $table->integer('timemodified')->default(0)->comment('timemodified');

            // Indexes
            $table->index(['itemtype', 'component', 'tagid', 'contextid'], 'taglookup');

            // Unique Indexes
            $table->unique(['component', 'itemtype', 'itemid', 'contextid', 'tiuserid', 'tagid'], 'taggeditem');

            // Foreign Keys
            $table->foreign('tagid')->references('id')->on('tag');
            $table->foreign('contextid')->references('id')->on('context');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tag_instance');
    }
};
