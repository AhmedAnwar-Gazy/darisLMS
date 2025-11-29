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
        // Identifies gradable areas where advanced grading can happen. For each area, the current active plugin can be set.
        Schema::create('grading_areas', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('contextid')->comment('The context of the gradable area, eg module instance context.');
            $table->string('component', 100)->comment('Frankenstyle name of the component holding this area');
            $table->string('areaname', 100)->comment('The name of gradable area');
            $table->string('activemethod', 100)->nullable()->comment('The default grading method (plugin) that should be used for this area');

            // Unique Indexes
            $table->unique(['contextid', 'component', 'areaname'], 'uq_gradable_area');

            // Foreign Keys
            $table->foreign('contextid')->references('id')->on('context');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grading_areas');
    }
};
