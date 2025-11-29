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
        // core_customfield field table
        Schema::create('customfield_field', function (Blueprint $table) {
            $table->id('id');
            $table->string('shortname', 100);
            $table->text('name');
            $table->string('type', 100);
            $table->text('description')->nullable();
            $table->integer('descriptionformat')->nullable();
            $table->integer('sortorder')->nullable();
            $table->unsignedBigInteger('categoryid')->nullable();
            $table->text('configdata')->nullable();
            $table->integer('timecreated');
            $table->integer('timemodified');

            // Indexes
            $table->index(['categoryid', 'sortorder'], 'categoryid_sortorder');

            // Foreign Keys
            $table->foreign('categoryid')->references('id')->on('customfield_category');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customfield_field');
    }
};
