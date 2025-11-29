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
        // Table to store factor configurations for users
        Schema::create('tool_mfa', function (Blueprint $table) {
            $table->id('id');
            $table->integer('userid')->comment('User ID');
            $table->string('factor', 100)->comment('Factor type');
            $table->text('secret')->nullable()->comment('Any secret data for factor');
            $table->text('label')->nullable()->comment('label for factor instance, eg device or email.');
            $table->bigInteger('timecreated')->nullable()->comment('Time the factor instance was setup');
            $table->string('createdfromip', 100)->nullable()->comment('IP that the factor was setup from');
            $table->bigInteger('timemodified')->nullable()->comment('Time factor was last modified.');
            $table->bigInteger('lastverified')->nullable()->comment('Time user was last verified with this factor.');
            $table->boolean('revoked')->default(0);
            $table->smallInteger('lockcounter')->default(0)->comment('Counter of failed attempts');

            // Indexes
            $table->index(['userid'], 'userid');
            $table->index(['factor'], 'factor');
            $table->index(['userid', 'factor', 'lockcounter'], 'lockcounter');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tool_mfa');
    }
};
