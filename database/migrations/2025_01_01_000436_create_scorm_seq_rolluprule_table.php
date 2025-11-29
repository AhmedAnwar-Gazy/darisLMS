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
        // SCORM2004 sequencing rule
        Schema::create('scorm_seq_rolluprule', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('scoid')->default(0);
            $table->string('childactivityset', 15);
            $table->integer('minimumcount')->default(0);
            $table->string('minimumpercent')->default(0.0000);
            $table->string('conditioncombination', 3)->default('all');
            $table->string('action', 15);

            // Unique Indexes
            $table->unique(['scoid', 'id'], 'scorm_rolluprule_uniq');

            // Foreign Keys
            $table->foreign('scoid')->references('id')->on('scorm_scoes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scorm_seq_rolluprule');
    }
};
