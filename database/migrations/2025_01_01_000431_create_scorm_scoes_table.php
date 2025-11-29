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
        // each SCO part of the SCORM module
        Schema::create('scorm_scoes', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('scorm')->default(0);
            $table->string('manifest', 255);
            $table->string('organization', 255);
            $table->string('parent', 255);
            $table->string('identifier', 255);
            $table->text('launch');
            $table->string('scormtype', 5);
            $table->string('title', 255);
            $table->integer('sortorder')->default(0)->comment('order of scoes');

            // Foreign Keys
            $table->foreign('scorm')->references('id')->on('scorm');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scorm_scoes');
    }
};
