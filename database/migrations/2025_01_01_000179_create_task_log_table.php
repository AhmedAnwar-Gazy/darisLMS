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
        // The log table for all tasks
        Schema::create('task_log', function (Blueprint $table) {
            $table->id('id');
            $table->smallInteger('type')->comment('The type of task. Scheduled task = 0; Adhoc task = 1.');
            $table->string('component', 255)->comment('The component that the task belongs to');
            $table->string('classname', 255)->comment('The class of the task being run');
            $table->unsignedBigInteger('userid')->comment('The userid that the task was configured to run as (Adhoc tasks only)');
            $table->decimal('timestart', 20, 10)->comment('The start time of the task');
            $table->decimal('timeend', 20, 10)->comment('The end time of the task');
            $table->integer('dbreads')->comment('The number of DB reads performed during the task.');
            $table->integer('dbwrites')->comment('The number of DB writes performed during the task.');
            $table->tinyInteger('result')->comment('Whether the task was successful or not. 0 = pass; 1 = fail.');
            $table->text('output');
            $table->string('hostname', 255)->nullable()->comment('Hostname where the task was executed');
            $table->integer('pid')->nullable()->comment('PHP process ID that was running the task');

            // Indexes
            $table->index(['classname'], 'classname');
            $table->index(['timestart'], 'timestart');

            // Foreign Keys
            $table->foreign('userid')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('task_log');
    }
};
