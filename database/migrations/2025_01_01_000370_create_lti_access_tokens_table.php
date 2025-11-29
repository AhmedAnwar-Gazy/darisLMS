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
        // Security tokens for accessing of LTI services
        Schema::create('lti_access_tokens', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('typeid')->comment('Basic LTI type id');
            $table->text('scope')->comment('Scope values as JSON array');
            $table->string('token', 128)->comment('security token, aka private access key');
            $table->integer('validuntil')->comment('timestamp - valid until data');
            $table->integer('timecreated')->comment('created timestamp');
            $table->integer('lastaccess')->nullable()->comment('last access timestamp');

            // Unique Indexes
            $table->unique(['token'], 'token');

            // Foreign Keys
            $table->foreign('typeid')->references('id')->on('lti_types');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lti_access_tokens');
    }
};
