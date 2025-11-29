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
        // The evidence linked to a user competency
        Schema::create('competency_evidence', function (Blueprint $table) {
            $table->id('id');
            $table->integer('usercompetencyid');
            $table->unsignedBigInteger('contextid');
            $table->tinyInteger('action');
            $table->unsignedBigInteger('actionuserid')->nullable();
            $table->string('descidentifier', 255);
            $table->string('desccomponent', 255);
            $table->text('desca')->nullable();
            $table->string('url', 255)->nullable();
            $table->integer('grade')->nullable();
            $table->text('note')->nullable()->comment('A non-localised text to attach to the evidence.');
            $table->integer('timecreated');
            $table->integer('timemodified');
            $table->unsignedBigInteger('usermodified');

            // Indexes
            $table->index(['usercompetencyid'], 'usercompetencyid');

            // Foreign Keys
            $table->foreign('contextid')->references('id')->on('context');
            $table->foreign('actionuserid')->references('id')->on('users');
            $table->foreign('usermodified')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('competency_evidence');
    }
};
