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
        // built in and custom external services
        Schema::create('external_services', function (Blueprint $table) {
            $table->id('id');
            $table->string('name', 200);
            $table->boolean('enabled');
            $table->string('requiredcapability', 150)->nullable();
            $table->boolean('restrictedusers');
            $table->string('component', 100)->nullable();
            $table->integer('timecreated');
            $table->integer('timemodified')->nullable();
            $table->string('shortname', 255)->nullable()->comment('a unique shortname');
            $table->boolean('downloadfiles')->default(0)->comment('1 if the service allow people to download file from webservice/plugins.php - 0 if not');
            $table->boolean('uploadfiles')->default(0)->comment('1 if the service allow people to upload files to webservice/upload.php - 0 if not');

            // Unique Indexes
            $table->unique(['name'], 'name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('external_services');
    }
};
