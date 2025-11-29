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
        // Steps in an tour
        Schema::create('tool_usertours_steps', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('tourid');
            $table->text('title')->nullable()->comment('Title of the step');
            $table->text('content')->nullable()->comment('Content of the user tour - allow for multilang tags');
            $table->smallInteger('contentformat')->default(0);
            $table->tinyInteger('targettype')->comment('Type of the target (e.g. block, CSS selector, etc.)');
            $table->text('targetvalue')->comment('The value for the specified target type.');
            $table->integer('sortorder')->default(0);
            $table->text('configdata');

            // Indexes
            $table->index(['tourid', 'sortorder'], 'orderedsteps');

            // Foreign Keys
            $table->foreign('tourid')->references('id')->on('tool_usertours_tours');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tool_usertours_steps');
    }
};
