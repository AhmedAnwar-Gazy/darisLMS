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
        Schema::create('scorm_seq_rolluprulecond', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('scoid')->default(0);
            $table->unsignedBigInteger('rollupruleid')->default(0);
            $table->string('operator', 5)->default('noOp');
            $table->string('cond', 25);

            // Unique Indexes
            $table->unique(['scoid', 'rollupruleid', 'id'], 'scorm_rulluprulecond_uniq');

            // Foreign Keys
            $table->foreign('scoid')->references('id')->on('scorm_scoes');
            $table->foreign('rollupruleid')->references('id')->on('scorm_seq_rolluprule');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scorm_seq_rolluprulecond');
    }
};
