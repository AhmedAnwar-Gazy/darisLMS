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
        // The stored xAPI states
        Schema::create('xapi_states', function (Blueprint $table) {
            $table->id('id');
            $table->string('component', 255)->comment('The component name');
            $table->integer('userid')->nullable();
            $table->integer('itemid')->comment('The Agent Id (usually the plugin instance)');
            $table->string('stateid', 255)->comment('Component identified for the state data');
            $table->text('statedata')->nullable()->comment('JSON state data');
            $table->string('registration', 255)->nullable()->comment('Optional registration identifier');
            $table->integer('timecreated');
            $table->integer('timemodified')->nullable();

            // Indexes
            $table->index(['component', 'itemid'], 'component-itemid');
            $table->index(['userid'], 'userid');
            $table->index(['timemodified'], 'timemodified');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('xapi_states');
    }
};
