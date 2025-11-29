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
        // The bigbluebuttonbn table to store meeting activity events
        Schema::create('bigbluebuttonbn_logs', function (Blueprint $table) {
            $table->id('id');
            $table->integer('courseid');
            $table->integer('bigbluebuttonbnid');
            $table->integer('userid')->nullable();
            $table->integer('timecreated')->default(0);
            $table->text('meetingid');
            $table->string('log', 32);
            $table->text('meta')->nullable();

            // Indexes
            $table->index(['courseid'], 'courseid');
            $table->index(['log'], 'log');
            $table->index(['courseid', 'bigbluebuttonbnid', 'userid', 'log'], 'logrow');
            $table->index(['userid', 'log'], 'userlog');
            $table->index(['courseid', 'bigbluebuttonbnid'], 'course_bbbid_ix');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bigbluebuttonbn_logs');
    }
};
