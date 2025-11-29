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
        // all glossaries
        Schema::create('glossary', function (Blueprint $table) {
            $table->id('id');
            $table->integer('course')->default(0);
            $table->string('name', 255);
            $table->text('intro');
            $table->smallInteger('introformat')->default(0);
            $table->tinyInteger('allowduplicatedentries')->default(0);
            $table->string('displayformat', 50)->default('dictionary');
            $table->tinyInteger('mainglossary')->default(0);
            $table->tinyInteger('showspecial')->default(1);
            $table->tinyInteger('showalphabet')->default(1);
            $table->tinyInteger('showall')->default(1);
            $table->tinyInteger('allowcomments')->default(0);
            $table->tinyInteger('allowprintview')->default(1);
            $table->tinyInteger('usedynalink')->default(1);
            $table->tinyInteger('defaultapproval')->default(1);
            $table->string('approvaldisplayformat', 50)->default('default')->comment('Display Format when approving entries');
            $table->tinyInteger('globalglossary')->default(0);
            $table->tinyInteger('entbypage')->default(10);
            $table->tinyInteger('editalways')->default(0);
            $table->tinyInteger('rsstype')->default(0);
            $table->tinyInteger('rssarticles')->default(0);
            $table->integer('assessed')->default(0);
            $table->integer('assesstimestart')->default(0);
            $table->integer('assesstimefinish')->default(0);
            $table->integer('scale')->default(0);
            $table->integer('timecreated')->default(0);
            $table->integer('timemodified')->default(0);
            $table->integer('completionentries')->default(0)->comment('Non zero if a certain number of entries are required to mark this glossary complete for a user.');

            // Indexes
            $table->index(['course'], 'course');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glossary');
    }
};
