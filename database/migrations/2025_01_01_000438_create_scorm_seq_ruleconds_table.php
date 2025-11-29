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
        // SCORM2004 rule conditions
        Schema::create('scorm_seq_ruleconds', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('scoid')->default(0);
            $table->string('conditioncombination', 3)->default('all');
            $table->tinyInteger('ruletype')->default(0);
            $table->string('action', 25);

            // Unique Indexes
            $table->unique(['scoid', 'id'], 'scorm_ruleconds_un');

            // Foreign Keys
            $table->foreign('scoid')->references('id')->on('scorm_scoes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scorm_seq_ruleconds');
    }
};
