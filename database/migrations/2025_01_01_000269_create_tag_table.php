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
        // Tag table - this generic table will replace the old "tags" table.
        Schema::create('tag', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('userid');
            $table->unsignedBigInteger('tagcollid');
            $table->string('name', 255);
            $table->string('rawname', 255)->comment('The raw, unnormalised name for the tag as entered by users');
            $table->boolean('isstandard')->default(0)->comment('Whether this tag is standard');
            $table->text('description')->nullable();
            $table->tinyInteger('descriptionformat')->default(0);
            $table->smallInteger('flag')->nullable()->default(0)->comment('a tag can be \'flagged\' as inappropriate');
            $table->integer('timemodified')->nullable();

            // Indexes
            $table->index(['tagcollid', 'isstandard'], 'tagcolltype');

            // Unique Indexes
            $table->unique(['tagcollid', 'name'], 'tagcollname');

            // Foreign Keys
            $table->foreign('userid')->references('id')->on('users');
            $table->foreign('tagcollid')->references('id')->on('tag_coll');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tag');
    }
};
