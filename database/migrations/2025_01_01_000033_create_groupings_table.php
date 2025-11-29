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
        // A grouping is a collection of groups. WAS: groups_groupings
        Schema::create('groupings', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('courseid')->default(0);
            $table->string('name', 255)->comment('Short human readable unique name for group.');
            $table->string('idnumber', 100);
            $table->text('description')->nullable();
            $table->tinyInteger('descriptionformat')->default(0);
            $table->text('configdata')->nullable()->comment('extra configuration data - may be used by group IU tools');
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
        Schema::dropIfExists('groupings');
    }
};
