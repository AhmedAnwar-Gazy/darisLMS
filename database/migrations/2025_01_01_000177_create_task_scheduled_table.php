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
        // List of scheduled tasks to be run by cron.
        Schema::create('task_scheduled', function (Blueprint $table) {
            $table->id('id');
            $table->string('component', 255)->comment('The component this scheduled task belongs to.');
            $table->string('classname', 255)->comment('The class extending scheduled_task to be called when running this task.');
            $table->integer('lastruntime')->nullable();
            $table->integer('nextruntime')->nullable();
            $table->tinyInteger('blocking')->default(0)->comment('Block the entire cron when this task is running.');
            $table->string('minute', 200);
            $table->string('hour', 70);
            $table->string('day', 90);
            $table->string('month', 30);
            $table->string('dayofweek', 25);
            $table->integer('faildelay')->nullable();
            $table->tinyInteger('customised')->default(0)->comment('Used on upgrades to prevent overwriting custom schedules.');
            $table->boolean('disabled')->default(0)->comment('1 means do not run from cron');
            $table->integer('timestarted')->nullable()->comment('Time when the task was started');
            $table->string('hostname', 255)->nullable()->comment('Hostname where the task is running');
            $table->integer('pid')->nullable()->comment('PHP process ID that is running the task');

            // Unique Indexes
            $table->unique(['classname'], 'classname_uniq');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('task_scheduled');
    }
};
