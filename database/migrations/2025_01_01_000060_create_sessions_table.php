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
        // Database based session storage - now recommended
        Schema::create('moodle_sessions', function (Blueprint $table) {
            $table->id('id');
            $table->integer('state')->default(0)->comment('0 means normal session');
            $table->string('sid', 128)->comment('Session id');
            $table->unsignedBigInteger('userid');
            $table->text('sessdata')->nullable()->comment('session content');
            $table->integer('timecreated');
            $table->integer('timemodified');
            $table->string('firstip', 45)->nullable();
            $table->string('lastip', 45)->nullable();

            // Indexes
            $table->index(['state'], 'state');
            $table->index(['timecreated'], 'timecreated');
            $table->index(['timemodified'], 'timemodified');

            // Unique Indexes
            $table->unique(['sid'], 'sid');

            // Foreign Keys
            $table->foreign('userid')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('moodle_sessions');
    }
};
