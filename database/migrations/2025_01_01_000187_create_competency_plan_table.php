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
        // Learning plans
        Schema::create('competency_plan', function (Blueprint $table) {
            $table->id('id');
            $table->string('name', 100);
            $table->text('description')->nullable();
            $table->smallInteger('descriptionformat')->default(0);
            $table->integer('userid');
            $table->integer('templateid')->nullable();
            $table->integer('origtemplateid')->nullable()->comment('The template ID this plan was based on originally');
            $table->boolean('status');
            $table->integer('duedate')->nullable()->default(0);
            $table->integer('reviewerid')->nullable();
            $table->integer('timecreated');
            $table->integer('timemodified')->default(0);
            $table->unsignedBigInteger('usermodified');

            // Indexes
            $table->index(['userid', 'status'], 'useridstatus');
            $table->index(['templateid'], 'templateid');
            $table->index(['status', 'duedate'], 'statusduedate');

            // Foreign Keys
            $table->foreign('usermodified')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('competency_plan');
    }
};
