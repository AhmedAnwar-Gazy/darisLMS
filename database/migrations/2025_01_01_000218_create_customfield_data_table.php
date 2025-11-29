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
        // core_customfield data table
        Schema::create('customfield_data', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('fieldid');
            $table->integer('instanceid');
            $table->integer('intvalue')->nullable();
            $table->decimal('decvalue', 10, 5)->nullable();
            $table->string('shortcharvalue', 255)->nullable();
            $table->text('charvalue')->nullable();
            $table->text('value');
            $table->integer('valueformat');
            $table->integer('timecreated');
            $table->integer('timemodified');
            $table->unsignedBigInteger('contextid')->nullable();

            // Indexes
            $table->index(['fieldid', 'intvalue'], 'fieldid-intvalue');
            $table->index(['fieldid', 'shortcharvalue'], 'fieldid-shortcharvalue');
            $table->index(['fieldid', 'decvalue'], 'fieldid-decvalue');

            // Unique Indexes
            $table->unique(['instanceid', 'fieldid'], 'instanceid-fieldid');

            // Foreign Keys
            $table->foreign('fieldid')->references('id')->on('customfield_field');
            $table->foreign('contextid')->references('id')->on('context');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customfield_data');
    }
};
