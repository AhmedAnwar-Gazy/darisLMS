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
        // The definition of rubric rating scales
        Schema::create('workshopform_rubric_levels', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('dimensionid')->comment('Which criterion this level is part of');
            $table->decimal('grade', 10, 5)->comment('Grade representing this level.');
            $table->text('definition')->nullable()->comment('The definition of this level');
            $table->tinyInteger('definitionformat')->nullable()->default(0)->comment('The format of the definition field');

            // Foreign Keys
            $table->foreign('dimensionid')->references('id')->on('workshopform_rubric');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workshopform_rubric_levels');
    }
};
