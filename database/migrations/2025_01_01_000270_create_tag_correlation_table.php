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
        // The rationale for the \'tag_correlation\' table is performance.   It works as a cache for a potentially heavy load query done at the \'tag_instance\' table.   So, the \'tag_correlation\' table stores redundant information derived from the \'tag_instance\' table
        Schema::create('tag_correlation', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('tagid');
            $table->text('correlatedtags');

            // Foreign Keys
            $table->foreign('tagid')->references('id')->on('tag');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tag_correlation');
    }
};
