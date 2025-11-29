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
        // Relationship between user evidence and competencies
        Schema::create('competency_userevidencecomp', function (Blueprint $table) {
            $table->id('id');
            $table->integer('userevidenceid');
            $table->integer('competencyid');
            $table->integer('timecreated');
            $table->integer('timemodified');
            $table->unsignedBigInteger('usermodified');

            // Indexes
            $table->index(['userevidenceid'], 'userevidenceid');

            // Unique Indexes
            $table->unique(['userevidenceid', 'competencyid'], 'userevidencecompids');

            // Foreign Keys
            $table->foreign('usermodified')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('competency_userevidencecomp');
    }
};
