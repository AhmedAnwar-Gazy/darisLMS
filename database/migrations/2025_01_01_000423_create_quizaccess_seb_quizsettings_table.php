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
        // Stores the quiz level Safe Exam Browser configuration.
        Schema::create('quizaccess_seb_quizsettings', function (Blueprint $table) {
            $table->id('id');
            $table->integer('quizid')->comment('Foreign key to quiz id.');
            $table->integer('cmid')->comment('Foreign key to course module id.');
            $table->unsignedBigInteger('templateid')->comment('Foreign key to quizaccess_seb_template.id.');
            $table->boolean('requiresafeexambrowser')->comment('Bool whether to require SEB.');
            $table->boolean('showsebtaskbar')->nullable()->comment('Bool to show SEB task bar');
            $table->boolean('showwificontrol')->nullable()->comment('Bool to allow user to control networking.');
            $table->boolean('showreloadbutton')->nullable()->comment('Bool to show reload button.');
            $table->boolean('showtime')->nullable()->comment('Bool to show the clock.');
            $table->boolean('showkeyboardlayout')->nullable()->comment('Bool to show keyboard layout.');
            $table->boolean('allowuserquitseb')->nullable()->comment('Bool to show quit button.');
            $table->text('quitpassword')->nullable()->comment('Quit password to exit SEB.');
            $table->text('linkquitseb')->nullable()->comment('Link to exit SEB.');
            $table->boolean('userconfirmquit')->nullable()->comment('Bool whether confirm quit popup should appear.');
            $table->boolean('enableaudiocontrol')->nullable()->comment('Bool to show volume and audio controls.');
            $table->boolean('muteonstartup')->nullable()->comment('Bool whether browser starts muted.');
            $table->boolean('allowspellchecking')->nullable()->comment('Bool whether spell checking will happen in SEB.');
            $table->boolean('allowreloadinexam')->nullable()->comment('Bool whether user can reload.');
            $table->boolean('activateurlfiltering')->nullable()->comment('Bool whether URLs will be filtered.');
            $table->boolean('filterembeddedcontent')->nullable()->comment('Bool wither embedded content will be filtered');
            $table->text('expressionsallowed')->nullable()->comment('Comma or newline separated list of allowed expressions');
            $table->text('regexallowed')->nullable()->comment('Regex of allowed URLs');
            $table->text('expressionsblocked')->nullable()->comment('Comma or newline separated list of blocked expressions');
            $table->text('regexblocked')->nullable()->comment('Regex of blocked URLs');
            $table->text('allowedbrowserexamkeys')->nullable()->comment('List of allowed browser exam keys.');
            $table->boolean('showsebdownloadlink')->nullable()->comment('Bool whether SEB download link should appear');
            $table->unsignedBigInteger('usermodified')->default(0);
            $table->integer('timecreated')->default(0);
            $table->integer('timemodified')->default(0);

            // Unique Indexes
            $table->unique(['quizid'], 'quizid');
            $table->unique(['cmid'], 'cmid');

            // Foreign Keys
            $table->foreign('templateid')->references('id')->on('quizaccess_seb_template');
            $table->foreign('usermodified')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quizaccess_seb_quizsettings');
    }
};
