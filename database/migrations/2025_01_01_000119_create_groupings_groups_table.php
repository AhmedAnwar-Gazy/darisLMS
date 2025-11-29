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
        // Link a grouping to a group (note, groups can be in multiple groupings ONLY in a course). WAS: groups_groupings_groups
        Schema::create('groupings_groups', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('groupingid')->default(0);
            $table->unsignedBigInteger('groupid')->default(0);
            $table->integer('timeadded')->default(0);

            // Foreign Keys
            $table->foreign('groupingid')->references('id')->on('groupings');
            $table->foreign('groupid')->references('id')->on('groups');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('groupings_groups');
    }
};
