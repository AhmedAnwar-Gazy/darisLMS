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
        // Store session data from users migrating to other sites
        Schema::create('mnet_log', function (Blueprint $table) {
            $table->id('id');
            $table->integer('hostid')->default(0)->comment('Unique host ID');
            $table->integer('remoteid')->default(0);
            $table->integer('time')->default(0);
            $table->integer('userid')->default(0);
            $table->string('ip', 45);
            $table->integer('course')->default(0);
            $table->string('coursename', 40);
            $table->string('module', 20);
            $table->integer('cmid')->default(0);
            $table->string('action', 40);
            $table->string('url', 100);
            $table->string('info', 255);

            // Indexes
            $table->index(['hostid', 'userid', 'course'], 'hostid_userid_course');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mnet_log');
    }
};
