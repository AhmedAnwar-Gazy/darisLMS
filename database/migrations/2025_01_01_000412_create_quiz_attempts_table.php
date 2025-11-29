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
        // Stores users attempts at quizzes.
        Schema::create('quiz_attempts', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('quiz')->default(0)->comment('Foreign key reference to the quiz that was attempted.');
            $table->unsignedBigInteger('userid')->default(0)->comment('Foreign key reference to the user whose attempt this is.');
            $table->integer('attempt')->default(0)->comment('Sequentially numbers this student\'s attempts at this quiz.');
            $table->integer('uniqueid')->default(0)->comment('Foreign key reference to the question_usage that holds the details of the the question_attempts that make up this quiz attempt.');
            $table->text('layout');
            $table->integer('currentpage')->default(0);
            $table->tinyInteger('preview')->default(0);
            $table->string('state', 16)->default('inprogress')->comment('The current state of the attempts. \'inprogress\', \'overdue\', \'finished\' or \'abandoned\'.');
            $table->integer('timestart')->default(0)->comment('Time when the attempt was started.');
            $table->integer('timefinish')->default(0)->comment('Time when the attempt was submitted. 0 if the attempt has not been submitted yet.');
            $table->integer('timemodified')->default(0)->comment('Last modified time.');
            $table->integer('timemodifiedoffline')->default(0)->comment('Last modified time via web services.');
            $table->integer('timecheckstate')->nullable()->default(0)->comment('Next time quiz cron should check attempt for state changes.  NULL means never check.');
            $table->decimal('sumgrades', 10, 5)->nullable()->comment('Total marks for this attempt.');
            $table->integer('gradednotificationsenttime')->nullable()->comment('The timestamp when the \'graded\' notification was sent.');

            // Indexes
            $table->index(['state', 'timecheckstate'], 'state-timecheckstate');

            // Unique Indexes
            $table->unique(['uniqueid'], 'uniqueid');
            $table->unique(['quiz', 'userid', 'attempt'], 'quiz-userid-attempt');

            // Foreign Keys
            $table->foreign('quiz')->references('id')->on('quiz');
            $table->foreign('userid')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quiz_attempts');
    }
};
