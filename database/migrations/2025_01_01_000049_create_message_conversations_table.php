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
        // Stores all message conversations
        Schema::create('message_conversations', function (Blueprint $table) {
            $table->id('id');
            $table->integer('type')->default(1);
            $table->string('name', 255)->nullable();
            $table->string('convhash', 40)->nullable();
            $table->string('component', 100)->nullable()->comment('Defines the Moodle component which the area was added to');
            $table->string('itemtype', 100)->nullable();
            $table->integer('itemid')->nullable();
            $table->unsignedBigInteger('contextid')->nullable()->comment('The context id of the itemid or course of the itemtype was added');
            $table->boolean('enabled')->default(0);
            $table->integer('timecreated');
            $table->integer('timemodified')->nullable();

            // Indexes
            $table->index(['type'], 'type');
            $table->index(['convhash'], 'convhash');
            $table->index(['component', 'itemtype', 'itemid', 'contextid'], 'component-itemtype-itemid-contextid');

            // Foreign Keys
            $table->foreign('contextid')->references('id')->on('context');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('message_conversations');
    }
};
