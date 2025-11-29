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
        // Link a user to a cohort.
        Schema::create('cohort_members', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('cohortid')->default(0);
            $table->unsignedBigInteger('userid')->default(0);
            $table->integer('timeadded')->default(0);

            // Unique Indexes
            $table->unique(['cohortid', 'userid'], 'cohortid-userid');

            // Foreign Keys
            $table->foreign('cohortid')->references('id')->on('cohort');
            $table->foreign('userid')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cohort_members');
    }
};
