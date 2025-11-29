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
        // User access log and gradeback data
        Schema::create('enrol_lti_users', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('userid');
            $table->unsignedBigInteger('toolid');
            $table->text('serviceurl')->nullable();
            $table->text('sourceid')->nullable();
            $table->unsignedBigInteger('ltideploymentid')->nullable();
            $table->text('consumerkey')->nullable();
            $table->text('consumersecret')->nullable();
            $table->text('membershipsurl')->nullable();
            $table->text('membershipsid')->nullable();
            $table->decimal('lastgrade', 10, 5)->nullable()->comment('The last grade that was sent');
            $table->integer('lastaccess')->nullable()->comment('The time the user last accessed');
            $table->integer('timecreated')->nullable()->comment('The time the user was created');

            // Foreign Keys
            $table->foreign('userid')->references('id')->on('users');
            $table->foreign('toolid')->references('id')->on('enrol_lti_tools');
            $table->foreign('ltideploymentid')->references('id')->on('enrol_lti_deployment');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enrol_lti_users');
    }
};
