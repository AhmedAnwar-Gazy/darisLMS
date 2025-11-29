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
        // Contains accessibility check results summary information.
        Schema::create('tool_brickfield_summary', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('courseid');
            $table->boolean('status')->nullable();
            $table->integer('activities')->nullable();
            $table->integer('activitiespassed')->nullable();
            $table->integer('activitiesfailed')->nullable();
            $table->integer('errorschecktype1')->nullable();
            $table->integer('errorschecktype2')->nullable();
            $table->integer('errorschecktype3')->nullable();
            $table->integer('errorschecktype4')->nullable();
            $table->integer('errorschecktype5')->nullable();
            $table->integer('errorschecktype6')->nullable();
            $table->integer('errorschecktype7')->nullable();
            $table->integer('failedchecktype1')->nullable();
            $table->integer('failedchecktype2')->nullable();
            $table->integer('failedchecktype3')->nullable();
            $table->integer('failedchecktype4')->nullable();
            $table->integer('failedchecktype5')->nullable();
            $table->integer('failedchecktype6')->nullable();
            $table->integer('failedchecktype7')->nullable();
            $table->integer('percentchecktype1')->nullable();
            $table->integer('percentchecktype2')->nullable();
            $table->integer('percentchecktype3')->nullable();
            $table->integer('percentchecktype4')->nullable();
            $table->integer('percentchecktype5')->nullable();
            $table->integer('percentchecktype6')->nullable();
            $table->integer('percentchecktype7')->nullable();

            // Indexes
            $table->index(['status'], 'status');

            // Foreign Keys
            $table->foreign('courseid')->references('id')->on('course');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tool_brickfield_summary');
    }
};
