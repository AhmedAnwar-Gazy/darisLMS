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
        // Keeps track of individual submissions for LTI activities.
        Schema::create('lti_submission', function (Blueprint $table) {
            $table->id('id');
            $table->integer('ltiid')->comment('ID of the LTI tool instance');
            $table->integer('userid');
            $table->integer('datesubmitted');
            $table->integer('dateupdated');
            $table->decimal('gradepercent', 10, 5);
            $table->decimal('originalgrade', 10, 5);
            $table->integer('launchid');
            $table->tinyInteger('state');

            // Indexes
            $table->index(['ltiid'], 'ltiid');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lti_submission');
    }
};
