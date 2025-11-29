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
        // Information about how and when an local courses were published to hubs
        Schema::create('course_published', function (Blueprint $table) {
            $table->id('id');
            $table->string('huburl', 255)->nullable()->comment('the url of the "registered on" hub');
            $table->unsignedBigInteger('courseid')->comment('the id of the published course');
            $table->integer('timepublished')->comment('The time when the publication occurred');
            $table->boolean('enrollable')->default(1)->comment('1 = enrollable, 0 = downloadable');
            $table->integer('hubcourseid')->comment('the course id on the hub server');
            $table->boolean('status')->nullable()->default(0)->comment('is the publication published or not');
            $table->integer('timechecked')->nullable()->comment('the last time the status has been checked');

            // Indexes
            $table->index(['hubcourseid'], 'hubcourseid');

            // Foreign Keys
            $table->foreign('courseid')->references('id')->on('course');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_published');
    }
};
