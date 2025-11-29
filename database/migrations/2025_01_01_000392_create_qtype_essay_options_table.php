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
        // Extra options for essay questions.
        Schema::create('qtype_essay_options', function (Blueprint $table) {
            $table->id('id');
            $table->integer('questionid')->comment('Foreign key linking to the question table.');
            $table->string('responseformat', 16)->default('editor')->comment('The type of input area students should be given for their response.');
            $table->tinyInteger('responserequired')->default(1)->comment('Nonzero if an online text response is optional');
            $table->smallInteger('responsefieldlines')->default(15)->comment('Approximate height, in lines, of the input box the students should be given for their response.');
            $table->integer('minwordlimit')->nullable()->comment('Minimum number of words');
            $table->integer('maxwordlimit')->nullable()->comment('Maximum number of words');
            $table->smallInteger('attachments')->default(0)->comment('Whether, and how many, attachments a student is allowed to include with their response. -1 means unlimited.');
            $table->smallInteger('attachmentsrequired')->default(0)->comment('The number of attachments that should be required');
            $table->text('graderinfo')->nullable()->comment('Information shown to people with permission to manually grade the question, when they are grading.');
            $table->smallInteger('graderinfoformat')->default(0)->comment('The text format for graderinfo.');
            $table->text('responsetemplate')->nullable()->comment('The template to pre-populate student\'s response field during attempt.');
            $table->smallInteger('responsetemplateformat')->default(0)->comment('The text format for responsetemplate.');
            $table->integer('maxbytes')->default(0)->comment('Maximum size of attached files in bytes.');
            $table->text('filetypeslist')->nullable()->comment('What attachment file type a student is allowed to include with their response. * or empty means unlimited.');

            // Unique Indexes
            $table->unique(['questionid'], 'questionid');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('qtype_essay_options');
    }
};
