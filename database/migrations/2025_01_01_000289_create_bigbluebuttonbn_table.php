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
        // The bigbluebuttonbn table to store information about a meeting activities.
        Schema::create('bigbluebuttonbn', function (Blueprint $table) {
            $table->id('id');
            $table->tinyInteger('type')->default(0);
            $table->integer('course')->default(0);
            $table->string('name', 255);
            $table->text('intro')->nullable();
            $table->smallInteger('introformat')->default(1);
            $table->string('meetingid', 255);
            $table->string('moderatorpass', 255);
            $table->string('viewerpass', 255);
            $table->boolean('wait')->default(0);
            $table->boolean('record')->default(0);
            $table->boolean('recordallfromstart')->default(0);
            $table->boolean('recordhidebutton')->default(0);
            $table->text('welcome')->nullable();
            $table->smallInteger('voicebridge')->default(0);
            $table->integer('openingtime')->default(0);
            $table->integer('closingtime')->default(0);
            $table->integer('timecreated')->default(0);
            $table->integer('timemodified')->default(0);
            $table->text('presentation')->nullable();
            $table->text('participants')->nullable();
            $table->tinyInteger('userlimit')->default(0);
            $table->boolean('recordings_html')->default(0);
            $table->boolean('recordings_deleted')->default(1);
            $table->boolean('recordings_imported')->default(0);
            $table->boolean('recordings_preview')->default(0);
            $table->boolean('clienttype')->default(0);
            $table->boolean('muteonstart')->default(0);
            $table->boolean('disablecam')->default(0);
            $table->boolean('disablemic')->default(0);
            $table->boolean('disableprivatechat')->default(0);
            $table->boolean('disablepublicchat')->default(0);
            $table->boolean('disablenote')->default(0);
            $table->boolean('hideuserlist')->default(0);
            $table->integer('completionattendance')->default(0)->comment('Nonzero if a certain number of minutes in the meeting are required to mark an activity completed for a user.');
            $table->integer('completionengagementchats')->default(0)->comment('Nonzero if chat during the meeting is required to mark an activity completed for a user.');
            $table->integer('completionengagementtalks')->default(0)->comment('Nonzero if talking during the meeting is required to mark an activity completed for a user.');
            $table->integer('completionengagementraisehand')->default(0)->comment('Nonzero if raising hand during the meeting is required to mark an activity completed for a user.');
            $table->integer('completionengagementpollvotes')->default(0)->comment('Nonzero if poll voting during the meeting is required to mark an activity completed for a user.');
            $table->integer('completionengagementemojis')->default(0)->comment('Nonzero if the use of emojis during the meeting is required to mark an activity completed for a user.');
            $table->tinyInteger('guestallowed')->nullable()->default(0);
            $table->tinyInteger('mustapproveuser')->nullable()->default(1);
            $table->text('guestlinkuid')->nullable();
            $table->string('guestpassword', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bigbluebuttonbn');
    }
};
