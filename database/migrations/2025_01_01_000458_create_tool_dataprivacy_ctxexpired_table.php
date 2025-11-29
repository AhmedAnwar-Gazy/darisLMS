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
        // Default comment for the table, please edit me
        Schema::create('tool_dataprivacy_ctxexpired', function (Blueprint $table) {
            $table->id('id');
            $table->integer('contextid');
            $table->text('unexpiredroles')->nullable()->comment('Roles which have explicitly not expired yet.');
            $table->text('expiredroles')->nullable()->comment('Explicitly expires roles');
            $table->boolean('defaultexpired')->comment('The default retention period has passed.');
            $table->tinyInteger('status')->default(0);
            $table->integer('usermodified');
            $table->integer('timecreated');
            $table->integer('timemodified');

            // Unique Indexes
            $table->unique(['contextid'], 'contextid');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tool_dataprivacy_ctxexpired');
    }
};
