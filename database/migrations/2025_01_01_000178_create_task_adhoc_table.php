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
        // List of adhoc tasks waiting to run.
        Schema::create('task_adhoc', function (Blueprint $table) {
            $table->id('id');
            $table->string('component', 255)->comment('The component that triggered this adhoc task.');
            $table->string('classname', 255)->comment('The name of the class extending adhoc_task to run when this task is executed.');
            $table->integer('nextruntime');
            $table->integer('faildelay')->nullable();
            $table->text('customdata')->nullable()->comment('Custom data to be passed to the adhoc task. Must be serialisable using json_encode()');
            $table->unsignedBigInteger('userid')->nullable();
            $table->tinyInteger('blocking')->default(0);
            $table->integer('timecreated')->default(0)->comment('Timestamp of adhoc task creation');
            $table->integer('timestarted')->nullable()->comment('Time when the task was started');
            $table->string('hostname', 255)->nullable()->comment('Hostname where the task is running');
            $table->integer('pid')->nullable()->comment('PHP process ID that is running the task');

            // Indexes
            $table->index(['nextruntime'], 'nextruntime_idx');
            $table->index(['timestarted'], 'timestarted_idx');

            // Foreign Keys
            $table->foreign('userid')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('task_adhoc');
    }
};
