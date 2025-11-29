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
        // User competencies plans
        Schema::create('competency_usercompplan', function (Blueprint $table) {
            $table->id('id');
            $table->integer('userid')->comment('User associated to the competency.');
            $table->integer('competencyid')->comment('Competency associated to the user.');
            $table->integer('planid')->comment('Plan associated to the user.');
            $table->tinyInteger('proficiency')->nullable()->comment('Indicate if the competency is proficient not.');
            $table->integer('grade')->nullable()->comment('Grade assigned to the competency.');
            $table->integer('sortorder')->nullable()->comment('Relative sort order');
            $table->integer('timecreated');
            $table->integer('timemodified')->nullable();
            $table->unsignedBigInteger('usermodified');

            // Unique Indexes
            $table->unique(['userid', 'competencyid', 'planid'], 'usercompetencyplan');

            // Foreign Keys
            $table->foreign('usermodified')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('competency_usercompplan');
    }
};
