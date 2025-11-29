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
        // Stores Wiki activity configuration
        Schema::create('wiki', function (Blueprint $table) {
            $table->id('id');
            $table->integer('course')->default(0)->comment('Course wiki activity belongs to');
            $table->string('name', 255)->default('Wiki')->comment('name field for moodle instances');
            $table->text('intro')->nullable()->comment('General introduction of the wiki activity');
            $table->smallInteger('introformat')->default(0)->comment('Format of the intro field (MOODLE, HTML, MARKDOWN...)');
            $table->integer('timecreated')->default(0);
            $table->integer('timemodified')->default(0);
            $table->string('firstpagetitle', 255)->default('First Page')->comment('Wiki first page\'s name');
            $table->string('wikimode', 20)->default('collaborative')->comment('Wiki mode (individual, collaborative)');
            $table->string('defaultformat', 20)->default('creole')->comment('Wiki\'s default editor');
            $table->boolean('forceformat')->default(1)->comment('Forces the default editor');
            $table->integer('editbegin')->default(0)->comment('editbegin');
            $table->integer('editend')->nullable()->default(0)->comment('editend');

            // Indexes
            $table->index(['course'], 'course');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wiki');
    }
};
