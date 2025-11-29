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
        // Related competencies
        Schema::create('competency_relatedcomp', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('competencyid');
            $table->unsignedBigInteger('relatedcompetencyid');
            $table->integer('timecreated');
            $table->integer('timemodified')->nullable();
            $table->unsignedBigInteger('usermodified');

            // Foreign Keys
            $table->foreign('competencyid')->references('id')->on('competency');
            $table->foreign('relatedcompetencyid')->references('id')->on('competency');
            $table->foreign('usermodified')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('competency_relatedcomp');
    }
};
