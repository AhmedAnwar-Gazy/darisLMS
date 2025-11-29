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
        // Link a user to a group.
        Schema::create('groups_members', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('groupid')->default(0);
            $table->unsignedBigInteger('userid')->default(0);
            $table->integer('timeadded')->default(0);
            $table->string('component', 100)->comment('Defines the Moodle component which added this group membership (e.g. \'auth_myplugin\'), or blank if it was added manually. (Entries which are created by a Moodle component cannot be removed in the normal user interface.)');
            $table->integer('itemid')->default(0)->comment('If the \'component\' field is set, this can be used to define the instance of the component that created the entry. Otherwise should be left as default (0).');

            // Unique Indexes
            $table->unique(['userid', 'groupid'], 'useridgroupid');

            // Foreign Keys
            $table->foreign('groupid')->references('id')->on('groups');
            $table->foreign('userid')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('groups_members');
    }
};
