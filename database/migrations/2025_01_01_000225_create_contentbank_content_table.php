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
        // This table stores content data in the content bank.
        Schema::create('contentbank_content', function (Blueprint $table) {
            $table->id('id');
            $table->string('name', 255);
            $table->string('contenttype', 100);
            $table->unsignedBigInteger('contextid')->comment('References context.id.');
            $table->boolean('visibility')->default(1);
            $table->integer('instanceid')->nullable();
            $table->text('configdata')->nullable();
            $table->unsignedBigInteger('usercreated')->comment('The original author of the content');
            $table->unsignedBigInteger('usermodified')->nullable();
            $table->integer('timecreated')->default(0);
            $table->integer('timemodified')->nullable()->default(0);

            // Indexes
            $table->index(['name'], 'name');
            $table->index(['contextid', 'contenttype', 'instanceid'], 'instance');

            // Foreign Keys
            $table->foreign('contextid')->references('id')->on('context');
            $table->foreign('usermodified')->references('id')->on('users');
            $table->foreign('usercreated')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contentbank_content');
    }
};
