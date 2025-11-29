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
        // Defines different set of tags
        Schema::create('tag_coll', function (Blueprint $table) {
            $table->id('id');
            $table->string('name', 255)->nullable();
            $table->tinyInteger('isdefault')->default(0);
            $table->string('component', 100)->nullable();
            $table->smallInteger('sortorder')->default(0);
            $table->tinyInteger('searchable')->default(1)->comment('Whether the tag collection is searchable');
            $table->string('customurl', 255)->nullable()->comment('Custom URL for the tag page instead of /tag/index.php');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tag_coll');
    }
};
