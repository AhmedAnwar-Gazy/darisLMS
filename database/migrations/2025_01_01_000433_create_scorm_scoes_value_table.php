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
        // Values passed from SCORM package
        Schema::create('scorm_scoes_value', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('scoid')->comment('The id of the scorm_scoes table');
            $table->unsignedBigInteger('attemptid')->comment('id from scorm_attempt');
            $table->unsignedBigInteger('elementid')->comment('id from scorm_element');
            $table->text('value')->comment('Value passed from SCORM package');
            $table->integer('timemodified')->default(0)->comment('Time value last changed.');

            // Foreign Keys
            $table->foreign('scoid')->references('id')->on('scorm_scoes');
            $table->foreign('attemptid')->references('id')->on('scorm_attempt');
            $table->foreign('elementid')->references('id')->on('scorm_element');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scorm_scoes_value');
    }
};
