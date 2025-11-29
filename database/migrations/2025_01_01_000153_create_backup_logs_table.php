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
        // To store all the logs from backup and restore operations (by db logger)
        Schema::create('backup_logs', function (Blueprint $table) {
            $table->id('id');
            $table->string('backupid', 32)->comment('backupid the log record belongs to');
            $table->smallInteger('loglevel')->comment('level of the log (debug...error)');
            $table->text('message')->comment('text logged');
            $table->integer('timecreated')->comment('timestamp this log entry was created');

            // Unique Indexes
            $table->unique(['backupid', 'id'], 'backupid-id');

            // Foreign Keys
            $table->foreign('backupid')->references('backupid')->on('backup_controllers');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('backup_logs');
    }
};
