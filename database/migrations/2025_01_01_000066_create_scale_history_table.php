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
        // History table
        Schema::create('scale_history', function (Blueprint $table) {
            $table->id('id');
            $table->integer('action')->default(0)->comment('created/modified/deleted constants');
            $table->unsignedBigInteger('oldid');
            $table->string('source', 255)->nullable()->comment('What caused the modification? manual/module/import/...');
            $table->integer('timemodified')->nullable()->comment('The last time this grade_item was modified');
            $table->unsignedBigInteger('loggeduser')->nullable()->comment('the userid of the person who last modified this outcome');
            $table->unsignedBigInteger('courseid')->default(0);
            $table->unsignedBigInteger('userid')->default(0);
            $table->string('name', 255);
            $table->text('scale');
            $table->text('description');

            // Indexes
            $table->index(['action'], 'action');
            $table->index(['timemodified'], 'timemodified');

            // Foreign Keys
            $table->foreign('oldid')->references('id')->on('scale');
            $table->foreign('courseid')->references('id')->on('course');
            $table->foreign('loggeduser')->references('id')->on('users');
            $table->foreign('userid')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scale_history');
    }
};
