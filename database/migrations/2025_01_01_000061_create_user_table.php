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
        // One record for each person
        Schema::create('user', function (Blueprint $table) {
            $table->id('id');
            $table->string('auth', 20)->default('manual');
            $table->boolean('confirmed')->default(0);
            $table->boolean('policyagreed')->default(0);
            $table->boolean('deleted')->default(0);
            $table->boolean('suspended')->default(0)->comment('suspended flag prevents users to log in');
            $table->integer('mnethostid')->default(0);
            $table->string('username', 100);
            $table->string('password', 255);
            $table->string('idnumber', 255);
            $table->string('firstname', 100);
            $table->string('lastname', 100);
            $table->string('email', 100);
            $table->boolean('emailstop')->default(0);
            $table->string('phone1', 20);
            $table->string('phone2', 20);
            $table->string('institution', 255);
            $table->string('department', 255);
            $table->string('address', 255);
            $table->string('city', 120);
            $table->string('country', 2);
            $table->string('lang', 30)->default('en');
            $table->string('calendartype', 30)->default('gregorian');
            $table->string('theme', 50);
            $table->string('timezone', 100)->default(99);
            $table->integer('firstaccess')->default(0);
            $table->integer('lastaccess')->default(0);
            $table->integer('lastlogin')->default(0);
            $table->integer('currentlogin')->default(0);
            $table->string('lastip', 45);
            $table->string('secret', 15);
            $table->integer('picture')->default(0)->comment('0 means no image uploaded, positive values are revisions thta prevent caching problems, negative values are reserved for future use');
            $table->text('description')->nullable();
            $table->tinyInteger('descriptionformat')->default(1);
            $table->boolean('mailformat')->default(1);
            $table->boolean('maildigest')->default(0);
            $table->tinyInteger('maildisplay')->default(2);
            $table->boolean('autosubscribe')->default(1);
            $table->boolean('trackforums')->default(0);
            $table->integer('timecreated')->default(0);
            $table->integer('timemodified')->default(0);
            $table->integer('trustbitmask')->default(0);
            $table->string('imagealt', 255)->nullable()->comment('alt tag for user uploaded image');
            $table->string('lastnamephonetic', 255)->nullable()->comment('Last name phonetic');
            $table->string('firstnamephonetic', 255)->nullable()->comment('First name phonetic');
            $table->string('middlename', 255)->nullable()->comment('Middle name');
            $table->string('alternatename', 255)->nullable()->comment('Alternate name - Useful for three-name countries.');
            $table->string('moodlenetprofile', 255)->nullable()->comment('Moodle.net profile information');

            // Indexes
            $table->index(['deleted'], 'deleted');
            $table->index(['confirmed'], 'confirmed');
            $table->index(['firstname'], 'firstname');
            $table->index(['lastname'], 'lastname');
            $table->index(['city'], 'city');
            $table->index(['country'], 'country');
            $table->index(['lastaccess'], 'lastaccess');
            $table->index(['email'], 'email');
            $table->index(['auth'], 'auth');
            $table->index(['idnumber'], 'idnumber');
            $table->index(['firstnamephonetic'], 'firstnamephonetic');
            $table->index(['lastnamephonetic'], 'lastnamephonetic');
            $table->index(['middlename'], 'middlename');
            $table->index(['alternatename'], 'alternatename');

            // Unique Indexes
            $table->unique(['mnethostid', 'username'], 'username');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user');
    }
};
