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
        // Store files references
        Schema::create('files_reference', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('repositoryid');
            $table->integer('lastsync')->nullable()->comment('Last time the proxy file was synced with repository');
            $table->text('reference')->nullable()->comment('Identification of the external file. Repository plugins are interpreting it to locate the external file.');
            $table->string('referencehash', 40)->comment('Internal implementation detail, contains SHA1 hash of the reference field. Can be indexed and used for comparison. Not meant to be used by a non-core code.');

            // Unique Indexes
            $table->unique(['referencehash', 'repositoryid'], 'uq_external_file');

            // Foreign Keys
            $table->foreign('repositoryid')->references('id')->on('repository_instances');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('files_reference');
    }
};
