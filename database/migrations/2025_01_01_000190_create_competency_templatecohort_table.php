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
        // Default comment for the table, please edit me
        Schema::create('competency_templatecohort', function (Blueprint $table) {
            $table->id('id');
            $table->integer('templateid');
            $table->integer('cohortid');
            $table->integer('timecreated');
            $table->integer('timemodified');
            $table->unsignedBigInteger('usermodified');

            // Indexes
            $table->index(['templateid'], 'templateid');

            // Unique Indexes
            $table->unique(['templateid', 'cohortid'], 'templatecohortids');

            // Foreign Keys
            $table->foreign('usermodified')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('competency_templatecohort');
    }
};
