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
        // Contains the working checkout of all strings and their customization
        Schema::create('tool_customlang', function (Blueprint $table) {
            $table->id('id');
            $table->string('lang', 20)->comment('The code of the language this string belongs to. Like en, cs or es');
            $table->unsignedBigInteger('componentid')->comment('The id of the component');
            $table->string('stringid', 255)->comment('The identifier of the string');
            $table->text('original')->comment('English original of the string');
            $table->text('master')->nullable()->comment('Master translation of the string as is distributed in the official lang pack, null if not translated');
            $table->text('local')->nullable()->comment('Local customization of the string, null if not customized');
            $table->integer('timemodified')->comment('The timestamp of when the original or master was recently modified');
            $table->integer('timecustomized')->nullable()->comment('The timestamp of when the value of the local translation was recently modified, null if not customized yet');
            $table->tinyInteger('outdated')->nullable()->default(0)->comment('Either the English original or the master translation changed and the customization may be outdated');
            $table->tinyInteger('modified')->nullable()->default(0)->comment('Has the string been modified via the translator?');

            // Unique Indexes
            $table->unique(['lang', 'componentid', 'stringid'], 'uq_lang_component_string');

            // Foreign Keys
            $table->foreign('componentid')->references('id')->on('tool_customlang_components');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tool_customlang');
    }
};
