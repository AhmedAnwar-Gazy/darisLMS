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
        // Customisable user profile fields
        Schema::create('user_info_field', function (Blueprint $table) {
            $table->id('id');
            $table->string('shortname', 255)->default('shortname')->comment('short name for each field');
            $table->text('name')->comment('field name');
            $table->string('datatype', 255)->comment('Type of data held in this field');
            $table->text('description')->nullable()->comment('Description of field');
            $table->tinyInteger('descriptionformat')->default(0);
            $table->integer('categoryid')->default(0)->comment('id from category table');
            $table->integer('sortorder')->default(0)->comment('order within the category');
            $table->tinyInteger('required')->default(0)->comment('Field required');
            $table->tinyInteger('locked')->default(0)->comment('Field locked');
            $table->smallInteger('visible')->default(0)->comment('Visibility: private, public, hidden');
            $table->tinyInteger('forceunique')->default(0)->comment('should the field contain unique data');
            $table->tinyInteger('signup')->default(0)->comment('display field on signup page');
            $table->text('defaultdata')->nullable()->comment('Default value for this field');
            $table->tinyInteger('defaultdataformat')->default(0);
            $table->text('param1')->nullable()->comment('General parameter field');
            $table->text('param2')->nullable()->comment('General parameter field');
            $table->text('param3')->nullable()->comment('General parameter field');
            $table->text('param4')->nullable()->comment('General parameter field');
            $table->text('param5')->nullable()->comment('General parameter field');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_info_field');
    }
};
