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
        // Defines various tag areas, one area is identified by component and itemtype
        Schema::create('tag_area', function (Blueprint $table) {
            $table->id('id');
            $table->string('component', 100);
            $table->string('itemtype', 100);
            $table->boolean('enabled')->default(1);
            $table->unsignedBigInteger('tagcollid');
            $table->string('callback', 100)->nullable();
            $table->string('callbackfile', 100)->nullable();
            $table->boolean('showstandard')->default(0);
            $table->boolean('multiplecontexts')->default(0)->comment('Whether the tag area allows tag instances to be created in multiple contexts.');

            // Unique Indexes
            $table->unique(['component', 'itemtype'], 'compitemtype');

            // Foreign Keys
            $table->foreign('tagcollid')->references('id')->on('tag_coll');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tag_area');
    }
};
