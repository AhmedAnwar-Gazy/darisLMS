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
        // Upgrade logging
        Schema::create('upgrade_log', function (Blueprint $table) {
            $table->id('id');
            $table->integer('type')->comment('type: 0==info, 1==notice, 2==error');
            $table->string('plugin', 100)->nullable();
            $table->string('version', 100)->nullable()->comment('plugin or main version if known');
            $table->string('targetversion', 100)->nullable()->comment('version of plugin or core specified in version.php at the time of upgrade loggging');
            $table->string('info', 255);
            $table->text('details')->nullable();
            $table->text('backtrace')->nullable();
            $table->unsignedBigInteger('userid');
            $table->integer('timemodified');

            // Indexes
            $table->index(['timemodified'], 'timemodified');
            $table->index(['type', 'timemodified'], 'type-timemodified');

            // Foreign Keys
            $table->foreign('userid')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('upgrade_log');
    }
};
