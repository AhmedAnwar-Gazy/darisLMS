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
        // SCORM2004 objective description
        Schema::create('scorm_seq_objective', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('scoid')->default(0);
            $table->boolean('primaryobj')->default(0);
            $table->string('objectiveid', 255);
            $table->boolean('satisfiedbymeasure')->default(1);
            $table->string('minnormalizedmeasure')->default(0.0000);

            // Unique Indexes
            $table->unique(['scoid', 'id'], 'scorm_objective_uniq');

            // Foreign Keys
            $table->foreign('scoid')->references('id')->on('scorm_scoes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scorm_seq_objective');
    }
};
