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
        // Caches the information fetched via XML-RPC about courses on remote hosts that are offered for our users
        Schema::create('mnetservice_enrol_courses', function (Blueprint $table) {
            $table->id('id');
            $table->integer('hostid')->comment('The id of the remote MNet host');
            $table->integer('remoteid')->comment('ID of course on its home server');
            $table->integer('categoryid')->comment('The id of the category on the remote server');
            $table->string('categoryname', 255);
            $table->integer('sortorder')->default(0);
            $table->string('fullname', 254);
            $table->string('shortname', 100);
            $table->string('idnumber', 100);
            $table->text('summary');
            $table->tinyInteger('summaryformat')->nullable()->default(0)->comment('Format of the summary field');
            $table->integer('startdate');
            $table->integer('roleid')->comment('The ID of the role at the remote server that our users will get when we enrol them there');
            $table->string('rolename', 255)->comment('The name of the role at the remote server that our users will get when we enrol them there');

            // Unique Indexes
            $table->unique(['hostid', 'remoteid'], 'uq_hostid_remoteid');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mnetservice_enrol_courses');
    }
};
