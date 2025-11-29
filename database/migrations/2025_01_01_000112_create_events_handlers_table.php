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
        // This table is for storing which components requests what type of event, and the location of the responsible handlers. For example, the assignment registers \'grade_updated\' event with a function assignment_grade_handler() that should be called event time an \'grade_updated\' event is triggered by grade_update() function.
        Schema::create('events_handlers', function (Blueprint $table) {
            $table->id('id');
            $table->string('eventname', 166)->comment('name of the event, e.g. \'grade_updated\'');
            $table->string('component', 166)->comment('e.g. moodle, mod_forum, block_rss_client');
            $table->string('handlerfile', 255)->comment('path to the file of the function, eg /grade/export/lib.php');
            $table->text('handlerfunction')->nullable()->comment('serialized string or array describing function, suitable to be passed to call_user_func()');
            $table->string('schedule', 255)->nullable()->comment('\'cron\' or \'instant\'.');
            $table->integer('status')->default(0)->comment('number of failed attempts to process this handler');
            $table->tinyInteger('internal')->default(1)->comment('1 means standard plugin handler, 0 indicates if event handler sends data to external systems, this is used for example to prevent immediate sending of events from pending db transactions');

            // Unique Indexes
            $table->unique(['eventname', 'component'], 'eventname-component');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events_handlers');
    }
};
