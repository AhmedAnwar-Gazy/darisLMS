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
        // List of flags that can be set for a single user in a single assignment.
        Schema::create('assign_user_flags', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('userid')->default(0)->comment('The id of the user these flags apply to.');
            $table->unsignedBigInteger('assignment')->default(0)->comment('The assignment these flags apply to.');
            $table->integer('locked')->default(0)->comment('Student cannot make any changes to their submission if this flag is set.');
            $table->smallInteger('mailed')->default(0)->comment('Has the student been sent a notification about this grade update?');
            $table->integer('extensionduedate')->default(0)->comment('An extension date assigned to an individual student.');
            $table->string('workflowstate', 20)->nullable()->comment('The current workflow state of the grade');
            $table->integer('allocatedmarker')->default(0)->comment('The allocated marker to this submission');

            // Indexes
            $table->index(['mailed'], 'mailed');

            // Foreign Keys
            $table->foreign('userid')->references('id')->on('users');
            $table->foreign('assignment')->references('id')->on('assign');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assign_user_flags');
    }
};
