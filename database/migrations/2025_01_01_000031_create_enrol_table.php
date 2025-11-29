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
        // Instances of enrolment plugins used in courses, fields marked as custom have a plugin defined meaning, core does not touch them. Create a new linked table if you need even more custom fields.
        Schema::create('enrol', function (Blueprint $table) {
            $table->id('id');
            $table->string('enrol', 20);
            $table->integer('status')->default(0)->comment('0..9 are system constants, 0 means active enrolment, see ENROL_STATUS_* constants, plugins may define own status greater than 10');
            $table->unsignedBigInteger('courseid');
            $table->integer('sortorder')->default(0)->comment('order of enrol plugins in each course');
            $table->string('name', 255)->nullable()->comment('Optional instance name');
            $table->integer('enrolperiod')->nullable()->default(0)->comment('Custom - enrolment duration');
            $table->integer('enrolstartdate')->nullable()->default(0)->comment('Custom - start of self enrolment');
            $table->integer('enrolenddate')->nullable()->default(0)->comment('Custom - end of enrolment');
            $table->boolean('expirynotify')->nullable()->default(0)->comment('Custom - notify users before expiration');
            $table->integer('expirythreshold')->nullable()->default(0)->comment('Custom - when should be the participants notified');
            $table->boolean('notifyall')->nullable()->default(0)->comment('Custom - Notify both participant and person responsible for enrolments');
            $table->string('password', 50)->nullable()->comment('Custom - enrolment or access password');
            $table->string('cost', 20)->nullable()->comment('Custom - enrolment cost');
            $table->string('currency', 3)->nullable()->comment('Custom - cost currency');
            $table->unsignedBigInteger('roleid')->nullable()->default(0)->comment('Custom - the default role given to participants who self-enrol');
            $table->integer('customint1')->nullable()->comment('Custom - general int');
            $table->integer('customint2')->nullable()->comment('Custom - general int');
            $table->integer('customint3')->nullable()->comment('Custom - general int');
            $table->integer('customint4')->nullable()->comment('Custom - general int');
            $table->integer('customint5')->nullable()->comment('Custom - general int');
            $table->integer('customint6')->nullable()->comment('Custom - general int');
            $table->integer('customint7')->nullable()->comment('Custom - general int');
            $table->integer('customint8')->nullable()->comment('Custom - general int');
            $table->string('customchar1', 255)->nullable()->comment('Custom - general short name');
            $table->string('customchar2', 255)->nullable()->comment('Custom - general short name');
            $table->text('customchar3')->nullable()->comment('Custom - general short name');
            $table->decimal('customdec1', 12, 7)->nullable()->comment('Custom - general decimal');
            $table->decimal('customdec2', 12, 7)->nullable()->comment('Custom - general decimal');
            $table->text('customtext1')->nullable()->comment('Custom - general text');
            $table->text('customtext2')->nullable()->comment('Custom - general text');
            $table->text('customtext3')->nullable()->comment('Custom - general text');
            $table->text('customtext4')->nullable()->comment('Custom - general text');
            $table->integer('timecreated')->default(0);
            $table->integer('timemodified')->default(0);

            // Indexes
            $table->index(['enrol'], 'enrol');

            // Foreign Keys
            $table->foreign('courseid')->references('id')->on('course');
            $table->foreign('roleid')->references('id')->on('role');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enrol');
    }
};
