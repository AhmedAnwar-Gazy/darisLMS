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
        // Stores H5P content information
        Schema::create('h5p', function (Blueprint $table) {
            $table->id('id');
            $table->text('jsoncontent')->comment('The content in json format');
            $table->unsignedBigInteger('mainlibraryid')->comment('The library we first instanciate for this node');
            $table->smallInteger('displayoptions')->nullable()->comment('H5P Button display options');
            $table->string('pathnamehash', 40)->comment('Defines the complete unique hash for the file path where the H5P content was added.');
            $table->string('contenthash', 40)->comment('Defines the hash for the file content.');
            $table->text('filtered')->nullable()->comment('Filtered version of json_content');
            $table->integer('timecreated')->default(0);
            $table->integer('timemodified')->default(0);

            // Indexes
            $table->index(['pathnamehash'], 'pathnamehash_idx');

            // Foreign Keys
            $table->foreign('mainlibraryid')->references('id')->on('h5p_libraries');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('h5p');
    }
};
