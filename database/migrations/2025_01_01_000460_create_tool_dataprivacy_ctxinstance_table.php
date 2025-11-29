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
        Schema::create('tool_dataprivacy_ctxinstance', function (Blueprint $table) {
            $table->id('id');
            $table->integer('contextid');
            $table->unsignedBigInteger('purposeid')->nullable();
            $table->unsignedBigInteger('categoryid')->nullable();
            $table->integer('usermodified');
            $table->integer('timecreated');
            $table->integer('timemodified');

            // Unique Indexes
            $table->unique(['contextid'], 'contextid');

            // Foreign Keys
            $table->foreign('purposeid')->references('id')->on('tool_dataprivacy_purpose');
            $table->foreign('categoryid')->references('id')->on('tool_dataprivacy_category');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tool_dataprivacy_ctxinstance');
    }
};
