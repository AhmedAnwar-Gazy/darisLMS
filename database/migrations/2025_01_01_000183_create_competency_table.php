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
        // This table contains the master record of each competency in a framework
        Schema::create('competency', function (Blueprint $table) {
            $table->id('id');
            $table->string('shortname', 100)->nullable()->comment('Shortname of a competency');
            $table->text('description')->nullable()->comment('Description of a single competency');
            $table->smallInteger('descriptionformat')->default(0)->comment('The format of the description field');
            $table->string('idnumber', 100)->nullable();
            $table->integer('competencyframeworkid')->comment('The framework this competency relates to.');
            $table->integer('parentid')->default(0)->comment('The parent competency.');
            $table->string('path', 255)->comment('Used to speed up queries that use an entire branch of the tree. Looks like /5/34/54.');
            $table->integer('sortorder')->comment('Relative sort order within the branch');
            $table->string('ruletype', 100)->nullable();
            $table->tinyInteger('ruleoutcome')->default(0);
            $table->text('ruleconfig')->nullable();
            $table->unsignedBigInteger('scaleid')->nullable();
            $table->text('scaleconfiguration')->nullable();
            $table->integer('timecreated')->comment('The time this competency was created.');
            $table->integer('timemodified')->comment('The time this competency was last modified.');
            $table->unsignedBigInteger('usermodified')->nullable()->comment('The user who last modified this competency');

            // Indexes
            $table->index(['ruleoutcome'], 'ruleoutcome');

            // Unique Indexes
            $table->unique(['competencyframeworkid', 'idnumber'], 'idnumberframework');

            // Foreign Keys
            $table->foreign('scaleid')->references('id')->on('scale');
            $table->foreign('usermodified')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('competency');
    }
};
