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
        // Mapping of users to cohort role assignments.
        Schema::create('tool_cohortroles', function (Blueprint $table) {
            $table->id('id');
            $table->integer('cohortid')->comment('The cohort to sync');
            $table->integer('roleid')->comment('The role to assign');
            $table->integer('userid')->comment('The user to sync');
            $table->integer('timecreated')->comment('The time this record was created');
            $table->integer('timemodified')->comment('The time this record was modified.');
            $table->integer('usermodified')->nullable()->comment('Who last modified this record?');

            // Unique Indexes
            $table->unique(['cohortid', 'roleid', 'userid'], 'cohortuserrole');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tool_cohortroles');
    }
};
