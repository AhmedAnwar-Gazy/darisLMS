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
        // access keys used in cookieless scripts - rss, etc.
        Schema::create('user_private_key', function (Blueprint $table) {
            $table->id('id');
            $table->string('script', 128)->comment('plugin, module - unique identifier');
            $table->string('value', 128)->comment('private access key value');
            $table->unsignedBigInteger('userid')->comment('owner');
            $table->integer('instance')->nullable()->comment('optional instance id');
            $table->string('iprestriction', 255)->nullable()->comment('ip restriction');
            $table->integer('validuntil')->nullable()->comment('timestampt - valid until data');
            $table->integer('timecreated')->nullable()->comment('created timestamp');

            // Indexes
            $table->index(['script', 'value'], 'script-value');

            // Foreign Keys
            $table->foreign('userid')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_private_key');
    }
};
