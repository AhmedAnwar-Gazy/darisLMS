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
        // Stores the relationship between an arbitrary item (itemtype, itemid), and a context area (component, contextid) for a specific user. Used by the favourites subsystem.
        Schema::create('favourite', function (Blueprint $table) {
            $table->id('id');
            $table->string('component', 100)->comment('Defines the Moodle component in which the favourite was created.');
            $table->string('itemtype', 100)->comment('The type of the item which is being favourited. Usually a table name, but doesn\'t have to be. E.g. \'messages\' or \'message_conversations\'.');
            $table->integer('itemid')->comment('The identifier of the item which is being favourited.');
            $table->unsignedBigInteger('contextid')->comment('The context id of the item being favourited');
            $table->unsignedBigInteger('userid')->comment('The id of the user to whom the favourite belongs');
            $table->integer('ordering')->nullable()->comment('Optional ordering of the favourite within its context area. For example, this allows things like sorting favourite message conversations.');
            $table->integer('timecreated')->comment('Creation time');
            $table->integer('timemodified')->comment('Last modification time');

            // Unique Indexes
            $table->unique(['component', 'itemtype', 'itemid', 'contextid', 'userid'], 'uniqueuserfavouriteitem');

            // Foreign Keys
            $table->foreign('contextid')->references('id')->on('context');
            $table->foreign('userid')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('favourite');
    }
};
