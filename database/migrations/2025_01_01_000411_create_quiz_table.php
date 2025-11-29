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
        // The settings for each quiz.
        Schema::create('quiz', function (Blueprint $table) {
            $table->id('id');
            $table->integer('course')->default(0)->comment('Foreign key reference to the course this quiz is part of.');
            $table->string('name', 255)->comment('Quiz name.');
            $table->text('intro')->comment('Quiz introduction text.');
            $table->smallInteger('introformat')->default(0)->comment('Quiz intro text format.');
            $table->integer('timeopen')->default(0)->comment('The time when this quiz opens. (0 = no restriction.)');
            $table->integer('timeclose')->default(0)->comment('The time when this quiz closes. (0 = no restriction.)');
            $table->integer('timelimit')->default(0)->comment('The time limit for quiz attempts, in seconds.');
            $table->string('overduehandling', 16)->default('autoabandon')->comment('The method used to handle overdue attempts. \'autosubmit\', \'graceperiod\' or \'autoabandon\'.');
            $table->integer('graceperiod')->default(0)->comment('The amount of time (in seconds) after the time limit runs out during which attempts can still be submitted, if overduehandling is set to allow it.');
            $table->string('preferredbehaviour', 32)->comment('The behaviour to ask questions to use.');
            $table->smallInteger('canredoquestions')->default(0)->comment('Allows students to redo any completed question within a quiz attempt.');
            $table->integer('attempts')->default(0)->comment('The maximum number of attempts a student is allowed.');
            $table->smallInteger('attemptonlast')->default(0)->comment('Whether subsequent attempts start from the answer to the previous attempt (1) or start blank (0).');
            $table->smallInteger('grademethod')->default(1)->comment('One of the values QUIZ_GRADEHIGHEST, QUIZ_GRADEAVERAGE, QUIZ_ATTEMPTFIRST or QUIZ_ATTEMPTLAST.');
            $table->smallInteger('decimalpoints')->default(2)->comment('Number of decimal points to use when displaying grades.');
            $table->smallInteger('questiondecimalpoints')->default(-1)->comment('Number of decimal points to use when displaying question grades. (-1 means use decimalpoints.)');
            $table->integer('reviewattempt')->default(0)->comment('Whether users are allowed to review their quiz attempts at various times. This is a bit field, decoded by the \mod_quiz\question\display_options class. It is formed by ORing together the constants defined there.');
            $table->integer('reviewcorrectness')->default(0)->comment('Whether users are allowed to review the correctness of the questions in their quiz attempts at various times. A bit field, like reviewattempt.');
            $table->integer('reviewmaxmarks')->default(0)->comment('Works with reviewmarks to control whether users can see grades at various times. 0 here means no grade information is shown at all. If 1, student can see the number of marks available for this question, and reviewmarks applies. A bit field, like reviewattempt.');
            $table->integer('reviewmarks')->default(0)->comment('Works with reviewmaxmarks to control whether users can see grades at various times. If reviewmaxmarks is 1, then this controls whether students can see the the mark they got for the question, in addition to the max. A bit field, like reviewattempt.');
            $table->integer('reviewspecificfeedback')->default(0)->comment('Whether users are allowed to see the specific feedback in their quiz attempts. A bit field, like reviewattempt.');
            $table->integer('reviewgeneralfeedback')->default(0)->comment('Whether users are allowed to see the general feedback in their quiz attempts. A bit field, like reviewattempt.');
            $table->integer('reviewrightanswer')->default(0)->comment('Whether users are allowed to see the right answer in their quiz attempts. A bit field, like reviewattempt.');
            $table->integer('reviewoverallfeedback')->default(0)->comment('Whether users are allowed to see the overall feedback in their quiz attempts. A bit field, like reviewattempt.');
            $table->integer('questionsperpage')->default(0)->comment('How often to insert a page break when editing the quiz, or when shuffling the question order.');
            $table->string('navmethod', 16)->default('free')->comment('Any constraints on how the user is allowed to navigate around the quiz. Currently recognised values are \'free\' and \'seq\'.');
            $table->smallInteger('shuffleanswers')->default(0)->comment('Whether the parts of the question should be shuffled, in those question types that support it.');
            $table->decimal('sumgrades', 10, 5)->default(0)->comment('The total of all the question instance maxmarks.');
            $table->decimal('grade', 10, 5)->default(0)->comment('The total that the quiz overall grade is scaled to be out of.');
            $table->integer('timecreated')->default(0)->comment('The time when the quiz was added to the course.');
            $table->integer('timemodified')->default(0)->comment('Last modified time.');
            $table->string('password', 255)->comment('A password that the student must enter before starting or continuing a quiz attempt.');
            $table->string('subnet', 255)->comment('Used to restrict the IP addresses from which this quiz can be attempted. The format is as requried by the address_in_subnet function.');
            $table->string('browsersecurity', 32)->comment('Restriciton on the browser the student must use. E.g. \'securewindow\'.');
            $table->integer('delay1')->default(0)->comment('Delay that must be left between the first and second attempt, in seconds.');
            $table->integer('delay2')->default(0)->comment('Delay that must be left between the second and subsequent attempt, in seconds.');
            $table->smallInteger('showuserpicture')->default(0)->comment('Option to show the user\'s picture during the attempt and on the review page.');
            $table->smallInteger('showblocks')->default(0)->comment('Whether blocks should be shown on the attempt.php and review.php pages.');
            $table->boolean('completionattemptsexhausted')->nullable()->default(0);
            $table->integer('completionminattempts')->default(0);
            $table->boolean('allowofflineattempts')->nullable()->default(0)->comment('Whether to allow the quiz to be attempted offline in the mobile app');

            // Indexes
            $table->index(['course'], 'course');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quiz');
    }
};
