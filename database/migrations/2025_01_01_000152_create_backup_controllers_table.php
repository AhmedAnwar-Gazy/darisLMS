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
        // To store the backup_controllers as they are used
        Schema::create('backup_controllers', function (Blueprint $table) {
            $table->id('id');
            $table->string('backupid', 32)->comment('unique id of the backup');
            $table->string('operation', 20)->default('backup')->comment('Type of operation (backup/restore)');
            $table->string('type', 10)->comment('Type of the backup (activity/section/course)');
            $table->integer('itemid')->comment('id of the module/section/activity being backup');
            $table->string('format', 20)->comment('format of the backup (moodle/imscc...)');
            $table->smallInteger('interactive')->comment('is the backup interactive (1-yes/0-no)');
            $table->smallInteger('purpose')->comment('purpose (target) of the backup (general, import, hub...)');
            $table->unsignedBigInteger('userid')->comment('user that owns/performs the backup');
            $table->smallInteger('status')->comment('current status of the backup (configured, ui, running...)');
            $table->smallInteger('execution')->comment('type of execution (immediate/delayed)');
            $table->integer('executiontime')->comment('epoch secs when the backup should be executed (for delayed backups only)');
            $table->string('checksum', 32)->comment('checksum of the backup_controller object');
            $table->integer('timecreated')->comment('time the controller was created');
            $table->integer('timemodified')->comment('last time the controller was modified');
            $table->decimal('progress', 15, 14)->default(0)->comment('The backup or restore progress as a floating point number');
            $table->text('controller')->comment('serialised backup_controller object');

            // Indexes
            $table->index(['type', 'itemid'], 'typeitem_ix');
            $table->index(['userid', 'itemid'], 'useritem_ix');

            // Unique Indexes
            $table->unique(['backupid'], 'backupid_uk');

            // Foreign Keys
            $table->foreign('userid')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('backup_controllers');
    }
};
