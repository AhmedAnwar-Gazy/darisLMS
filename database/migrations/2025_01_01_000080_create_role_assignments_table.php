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
        // assigning roles in different context
        Schema::create('role_assignments', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('roleid')->default(0);
            $table->unsignedBigInteger('contextid')->default(0);
            $table->unsignedBigInteger('userid')->default(0);
            $table->integer('timemodified')->default(0);
            $table->integer('modifierid')->default(0);
            $table->string('component', 100)->comment('plugin responsible responsible for role assignment, empty when manually assigned');
            $table->integer('itemid')->default(0)->comment('Id of enrolment/auth instance responsible for this role assignment');
            $table->integer('sortorder')->default(0);

            // Indexes
            $table->index(['sortorder'], 'sortorder');
            $table->index(['roleid', 'contextid'], 'rolecontext');
            $table->index(['userid', 'contextid', 'roleid'], 'usercontextrole');
            $table->index(['component', 'itemid', 'userid'], 'component-itemid-userid');

            // Foreign Keys
            $table->foreign('roleid')->references('id')->on('role');
            $table->foreign('contextid')->references('id')->on('context');
            $table->foreign('userid')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('role_assignments');
    }
};
