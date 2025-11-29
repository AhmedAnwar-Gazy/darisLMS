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
        // Tracks users accepting the policy versions
        Schema::create('tool_policy_acceptances', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('policyversionid')->comment('ID of the policy document version');
            $table->unsignedBigInteger('userid')->comment('ID of the user this acceptance is relevant to');
            $table->boolean('status')->nullable()->comment('Acceptance status: 1 - accepted, 0 - not accepted');
            $table->string('lang', 30)->comment('Code of the language the user had when the policy document was displayed');
            $table->unsignedBigInteger('usermodified')->comment('ID of the user who last modified the acceptance record');
            $table->integer('timecreated')->comment('Timestamp of when the acceptance record was created');
            $table->integer('timemodified')->comment('Timestamp of when the acceptance record was last modified');
            $table->text('note')->nullable()->comment('Plain text note describing how the actual consent has been obtained if the policy has been accepted on other user\'s behalf.');

            // Unique Indexes
            $table->unique(['policyversionid', 'userid'], 'uq_versionuser');

            // Foreign Keys
            $table->foreign('policyversionid')->references('id')->on('tool_policy_versions');
            $table->foreign('userid')->references('id')->on('users');
            $table->foreign('usermodified')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tool_policy_acceptances');
    }
};
