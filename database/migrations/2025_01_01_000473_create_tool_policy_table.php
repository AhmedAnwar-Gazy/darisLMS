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
        // Contains the list of policy documents defined on the site.
        Schema::create('tool_policy', function (Blueprint $table) {
            $table->id('id');
            $table->smallInteger('sortorder')->default(999)->comment('Defines the order in which policies should be presented to users');
            $table->unsignedBigInteger('currentversionid')->nullable()->comment('ID of the current policy version that applies on the site, NULL if the policy does not apply');

            // Foreign Keys
            // Circular dependency with tool_policy_versions - handled by application or separate migration
            // $table->foreign('currentversionid')->references('id')->on('tool_policy_versions');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tool_policy');
    }
};
