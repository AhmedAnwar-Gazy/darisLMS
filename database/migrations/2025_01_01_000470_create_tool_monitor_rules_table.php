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
        // Table to store rules
        Schema::create('tool_monitor_rules', function (Blueprint $table) {
            $table->id('id');
            $table->text('description')->nullable()->comment('Description of the rule');
            $table->boolean('descriptionformat')->comment('Description format');
            $table->string('name', 254)->comment('Name of the rule');
            $table->integer('userid')->comment('Id of user who created the rule');
            $table->integer('courseid')->comment('Id of course to which this rule belongs.');
            $table->string('plugin', 254)->comment('Frankenstlye name of the plguin');
            $table->string('eventname', 254)->comment('Fully qualified name of the event');
            $table->text('template')->comment('Message template');
            $table->boolean('templateformat')->comment('Template format');
            $table->smallInteger('frequency')->comment('Frequency');
            $table->smallInteger('timewindow')->comment('Time window in seconds');
            $table->integer('timemodified')->comment('Timestamp when this rule was last modified');
            $table->integer('timecreated')->comment('Time stamp of when this rule was created');

            // Indexes
            $table->index(['courseid', 'userid'], 'courseanduser');
            $table->index(['eventname'], 'eventname');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tool_monitor_rules');
    }
};
