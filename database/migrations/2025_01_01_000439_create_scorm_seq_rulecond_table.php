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
        // SCORM2004 rule condition
        Schema::create('scorm_seq_rulecond', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('scoid')->default(0);
            $table->unsignedBigInteger('ruleconditionsid')->default(0);
            $table->string('refrencedobjective', 255);
            $table->string('measurethreshold')->default(0.0000);
            $table->string('operator', 5)->default('noOp');
            $table->string('cond', 30)->default('always');

            // Unique Indexes
            $table->unique(['id', 'scoid', 'ruleconditionsid'], 'scorm_rulecond_uniq');

            // Foreign Keys
            $table->foreign('scoid')->references('id')->on('scorm_scoes');
            $table->foreign('ruleconditionsid')->references('id')->on('scorm_seq_ruleconds');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scorm_seq_rulecond');
    }
};
