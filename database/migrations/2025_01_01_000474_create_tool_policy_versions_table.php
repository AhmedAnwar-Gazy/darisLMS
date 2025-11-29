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
        // Holds versions of the policy documents
        Schema::create('tool_policy_versions', function (Blueprint $table) {
            $table->id('id');
            $table->text('name')->comment('Name of the policy document');
            $table->tinyInteger('type')->default(0)->comment('Type of the policy: 0 - Site policy, 1 - Privacy policy, 2 - Third party policy, 99 - Other');
            $table->tinyInteger('audience')->default(0)->comment('Who is this policy targeted at: 0 - all users, 1 - logged in users only, 2 - guests only');
            $table->tinyInteger('archived')->default(0)->comment('Should the version be considered as archived. All non-archived, non-current versions are considered to be drafts.');
            $table->unsignedBigInteger('usermodified')->comment('ID of the user who last edited this policy document version.');
            $table->integer('timecreated')->comment('Timestamp of when the policy version was created.');
            $table->integer('timemodified')->comment('Timestamp of when the policy version was last modified.');
            $table->unsignedBigInteger('policyid')->comment('ID of the policy document we are version of.');
            $table->tinyInteger('agreementstyle')->default(0)->comment('How this agreement should flow: 0 - on the consent page, 1 - on a separate page before reaching the consent page.');
            $table->tinyInteger('optional')->default(0)->comment('0 - the policy must be accepted to use the site, 1 - accepting the policy is optional');
            $table->text('revision')->comment('Human readable version of the policy document');
            $table->text('summary')->comment('Policy text summary');
            $table->tinyInteger('summaryformat')->comment('Format of the summary field');
            $table->text('content')->comment('Full policy text');
            $table->tinyInteger('contentformat')->comment('Format of the content field');

            // Foreign Keys
            $table->foreign('usermodified')->references('id')->on('users');
            $table->foreign('policyid')->references('id')->on('tool_policy');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tool_policy_versions');
    }
};
