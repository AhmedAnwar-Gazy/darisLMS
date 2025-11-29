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
        // all database activities
        Schema::create('data', function (Blueprint $table) {
            $table->id('id');
            $table->integer('course')->default(0);
            $table->string('name', 255);
            $table->text('intro');
            $table->smallInteger('introformat')->default(0);
            $table->smallInteger('comments')->default(0);
            $table->integer('timeavailablefrom')->default(0);
            $table->integer('timeavailableto')->default(0);
            $table->integer('timeviewfrom')->default(0);
            $table->integer('timeviewto')->default(0);
            $table->integer('requiredentries')->default(0);
            $table->integer('requiredentriestoview')->default(0);
            $table->integer('maxentries')->default(0);
            $table->smallInteger('rssarticles')->default(0);
            $table->text('singletemplate')->nullable();
            $table->text('listtemplate')->nullable();
            $table->text('listtemplateheader')->nullable();
            $table->text('listtemplatefooter')->nullable();
            $table->text('addtemplate')->nullable();
            $table->text('rsstemplate')->nullable();
            $table->text('rsstitletemplate')->nullable();
            $table->text('csstemplate')->nullable();
            $table->text('jstemplate')->nullable();
            $table->text('asearchtemplate')->nullable();
            $table->smallInteger('approval')->default(0);
            $table->smallInteger('manageapproved')->default(1);
            $table->integer('scale')->default(0);
            $table->integer('assessed')->default(0);
            $table->integer('assesstimestart')->default(0);
            $table->integer('assesstimefinish')->default(0);
            $table->integer('defaultsort')->default(0);
            $table->smallInteger('defaultsortdir')->default(0);
            $table->smallInteger('editany')->default(0);
            $table->integer('notification')->default(0)->comment('Notify people when things change');
            $table->integer('timemodified')->default(0)->comment('The time the settings for this database module instance were last modified.');
            $table->text('config')->nullable();
            $table->integer('completionentries')->nullable()->default(0)->comment('Number of entries required for completion');

            // Indexes
            $table->index(['course'], 'course');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data');
    }
};
