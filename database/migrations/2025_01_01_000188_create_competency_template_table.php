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
        // Learning plan templates.
        Schema::create('competency_template', function (Blueprint $table) {
            $table->id('id');
            $table->string('shortname', 100)->nullable()->comment('Short name for the learning plan template.');
            $table->unsignedBigInteger('contextid');
            $table->text('description')->nullable()->comment('Description of this learning plan template');
            $table->smallInteger('descriptionformat')->default(0)->comment('The format of the description field');
            $table->tinyInteger('visible')->default(1)->comment('Used to show/hide this learning plan template.');
            $table->integer('duedate')->nullable()->comment('The default due date for instances of this plan.');
            $table->integer('timecreated')->comment('The time this learning plan template was created.');
            $table->integer('timemodified')->comment('The time this learning plan template was last modified.');
            $table->unsignedBigInteger('usermodified')->nullable()->comment('The user who last modified this learning plan template');

            // Foreign Keys
            $table->foreign('contextid')->references('id')->on('context');
            $table->foreign('usermodified')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('competency_template');
    }
};
