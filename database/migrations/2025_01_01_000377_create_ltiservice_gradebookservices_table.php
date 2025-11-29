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
        // This file records the grade items created by the LTI Gradebook Services service
        Schema::create('ltiservice_gradebookservices', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('gradeitemid')->comment('ID of the gradeItem related.');
            $table->integer('courseid')->comment('ID of the course related.');
            $table->integer('toolproxyid')->nullable()->comment('ID of the Tool Proxy instance.');
            $table->integer('typeid')->nullable()->comment('ID of the LTI Type if not Proxy.');
            $table->text('baseurl')->nullable()->comment('Lineitem URL that will be returned to the Tool provider');
            $table->unsignedBigInteger('ltilinkid')->nullable()->comment('ID of the LTI element related with this lineitem.');
            $table->text('resourceid')->nullable()->comment('Resource id for the line item');
            $table->string('tag', 255)->nullable()->comment('Tag type specified for the line item');
            $table->text('subreviewurl')->nullable()->comment('Submission review URL');
            $table->text('subreviewparams')->nullable()->comment('Submission review custom params');

            // Foreign Keys
            $table->foreign('ltilinkid')->references('id')->on('lti');
            $table->foreign('gradeitemid')->references('id')->on('grade_items');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ltiservice_gradebookservices');
    }
};
