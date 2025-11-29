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
        // Each record represents a group.
        Schema::create('groups', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('courseid');
            $table->string('idnumber', 100);
            $table->string('name', 254)->comment('Short human readable unique name for the group.');
            $table->text('description')->nullable();
            $table->tinyInteger('descriptionformat')->default(0);
            $table->string('enrolmentkey', 50)->nullable();
            $table->integer('picture')->default(0);
            $table->boolean('visibility')->default(0)->comment('Visibility of group membership');
            $table->boolean('participation')->default(1)->comment('Can this group be selected when participating in activities?');
            $table->integer('timecreated')->default(0);
            $table->integer('timemodified')->default(0);

            // Indexes
            $table->index(['idnumber'], 'idnumber');

            // Foreign Keys
            $table->foreign('courseid')->references('id')->on('course');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('groups');
    }
};
