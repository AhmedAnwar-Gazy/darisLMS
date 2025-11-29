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
        // Plan competencies
        Schema::create('competency_plancomp', function (Blueprint $table) {
            $table->id('id');
            $table->integer('planid');
            $table->integer('competencyid');
            $table->integer('sortorder')->nullable()->comment('Relative sort order');
            $table->integer('timecreated');
            $table->integer('timemodified')->nullable();
            $table->unsignedBigInteger('usermodified');

            // Unique Indexes
            $table->unique(['planid', 'competencyid'], 'planidcompetencyid');

            // Foreign Keys
            $table->foreign('usermodified')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('competency_plancomp');
    }
};
