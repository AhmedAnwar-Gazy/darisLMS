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
        // For everything with a time associated to it
        Schema::create('event', function (Blueprint $table) {
            $table->id('id');
            $table->text('name');
            $table->text('description');
            $table->smallInteger('format')->default(0);
            $table->unsignedBigInteger('categoryid')->default(0);
            $table->integer('courseid')->default(0);
            $table->integer('groupid')->default(0);
            $table->integer('userid')->default(0);
            $table->integer('repeatid')->default(0);
            $table->string('component', 100)->nullable()->comment('Component that created this event, if specified, only component itself can edit and delete it');
            $table->string('modulename', 20);
            $table->integer('instance')->default(0);
            $table->smallInteger('type')->default(0);
            $table->string('eventtype', 20);
            $table->integer('timestart')->default(0);
            $table->integer('timeduration')->default(0);
            $table->integer('timesort')->nullable();
            $table->smallInteger('visible')->default(1);
            $table->string('uuid', 255);
            $table->integer('sequence')->default(1);
            $table->integer('timemodified')->default(0);
            $table->unsignedBigInteger('subscriptionid')->nullable()->comment('The event_subscription id this event is associated with.');
            $table->integer('priority')->nullable()->comment('The event\'s display priority. For multiple events with the same module name, instance and eventtype (e.g. for group overrides), the one with the higher priority will be displayed.');
            $table->text('location')->nullable()->comment('Event Location');

            // Indexes
            $table->index(['courseid'], 'courseid');
            $table->index(['userid'], 'userid');
            $table->index(['timestart'], 'timestart');
            $table->index(['timeduration'], 'timeduration');
            $table->index(['uuid'], 'uuid');
            $table->index(['type', 'timesort'], 'type-timesort');
            $table->index(['groupid', 'courseid', 'categoryid', 'visible', 'userid'], 'groupid-courseid-categoryid-visible-userid');
            $table->index(['eventtype'], 'eventtype');
            $table->index(['component', 'eventtype', 'instance'], 'component');
            $table->index(['modulename', 'instance', 'eventtype'], 'modulename-instance-eventtype');

            // Foreign Keys
            $table->foreign('categoryid')->references('id')->on('course_categories');
            $table->foreign('subscriptionid')->references('id')->on('event_subscriptions');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event');
    }
};
