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
        Schema::create('mnet_session', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('userid')->default(0)->comment('Unique user ID');
            $table->string('username', 100)->comment('Unique username');
            $table->string('token', 40)->comment('Unique SHA1 Token');
            $table->unsignedBigInteger('mnethostid')->default(0)->comment('Unique remote host ID');
            $table->string('useragent', 40)->comment('SHA1 hash of User Agent');
            $table->integer('confirm_timeout')->default(0)->comment('UNIX timestamp for expiry of session');
            $table->string('session_id', 40)->comment('The PHP Session ID');
            $table->integer('expires')->default(0)->comment('Expire time of session on peer');

            // Unique Indexes
            $table->unique(['token'], 'token');

            // Foreign Keys
            $table->foreign('userid')->references('id')->on('users');
            $table->foreign('mnethostid')->references('id')->on('mnet_host');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mnet_session');
    }
};
