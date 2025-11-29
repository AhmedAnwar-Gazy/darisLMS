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
        // SCORM2004 objective mapinfo description
        Schema::create('scorm_seq_mapinfo', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('scoid')->default(0);
            $table->unsignedBigInteger('objectiveid')->default(0);
            $table->integer('targetobjectiveid')->default(0);
            $table->boolean('readsatisfiedstatus')->default(1);
            $table->boolean('readnormalizedmeasure')->default(1);
            $table->boolean('writesatisfiedstatus')->default(0);
            $table->boolean('writenormalizedmeasure')->default(0);

            // Unique Indexes
            $table->unique(['scoid', 'id', 'objectiveid'], 'scorm_mapinfo_uniq');

            // Foreign Keys
            $table->foreign('scoid')->references('id')->on('scorm_scoes');
            $table->foreign('objectiveid')->references('id')->on('scorm_seq_objective');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scorm_seq_mapinfo');
    }
};
