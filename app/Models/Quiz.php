<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Scout\Searchable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;

/**
 * Model Quiz
 * The settings for each quiz.
 */
class Quiz extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'quiz';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'course' => 'integer',
        'name' => 'string',
        'intro' => 'string',
        'introformat' => 'integer',
        'timeopen' => 'integer',
        'timeclose' => 'integer',
        'timelimit' => 'integer',
        'overduehandling' => 'string',
        'graceperiod' => 'integer',
        'preferredbehaviour' => 'string',
        'canredoquestions' => 'integer',
        'attempts' => 'integer',
        'attemptonlast' => 'integer',
        'grademethod' => 'integer',
        'decimalpoints' => 'integer',
        'questiondecimalpoints' => 'integer',
        'reviewattempt' => 'integer',
        'reviewcorrectness' => 'integer',
        'reviewmaxmarks' => 'integer',
        'reviewmarks' => 'integer',
        'reviewspecificfeedback' => 'integer',
        'reviewgeneralfeedback' => 'integer',
        'reviewrightanswer' => 'integer',
        'reviewoverallfeedback' => 'integer',
        'questionsperpage' => 'integer',
        'navmethod' => 'string',
        'shuffleanswers' => 'integer',
        'sumgrades' => 'float',
        'grade' => 'float',
        'timecreated' => 'integer',
        'timemodified' => 'integer',
        'password' => 'string',
        'subnet' => 'string',
        'browsersecurity' => 'string',
        'delay1' => 'integer',
        'delay2' => 'integer',
        'showuserpicture' => 'integer',
        'showblocks' => 'integer',
        'completionattemptsexhausted' => 'boolean',
        'completionminattempts' => 'integer',
        'allowofflineattempts' => 'boolean',
    ];

    // Relationships: HasMany
    public function quizGradess()
    {
        return $this->hasMany(QuizGrades::class, 'quiz');
    }

    public function quizAttemptss()
    {
        return $this->hasMany(QuizAttempts::class, 'quiz');
    }

    public function quizSlotss()
    {
        return $this->hasMany(QuizSlots::class, 'quizid');
    }

    public function quizFeedbacks()
    {
        return $this->hasMany(QuizFeedback::class, 'quizid');
    }

    public function quizSectionss()
    {
        return $this->hasMany(QuizSections::class, 'quizid');
    }

    public function quizOverridess()
    {
        return $this->hasMany(QuizOverrides::class, 'quiz');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'course' => (int)$this->course,
            'name' => (string)$this->name,
            'intro' => (string)$this->intro,
            'introformat' => (int)$this->introformat,
            'timeopen' => (int)$this->timeopen,
            'timeclose' => (int)$this->timeclose,
            'timelimit' => (int)$this->timelimit,
            'overduehandling' => (string)$this->overduehandling,
            'graceperiod' => (int)$this->graceperiod,
            'preferredbehaviour' => (string)$this->preferredbehaviour,
            'canredoquestions' => (int)$this->canredoquestions,
            'attempts' => (int)$this->attempts,
            'attemptonlast' => (int)$this->attemptonlast,
            'grademethod' => (int)$this->grademethod,
            'decimalpoints' => (int)$this->decimalpoints,
            'questiondecimalpoints' => (int)$this->questiondecimalpoints,
            'reviewattempt' => (int)$this->reviewattempt,
            'reviewcorrectness' => (int)$this->reviewcorrectness,
            'reviewmaxmarks' => (int)$this->reviewmaxmarks,
            'reviewmarks' => (int)$this->reviewmarks,
            'reviewspecificfeedback' => (int)$this->reviewspecificfeedback,
            'reviewgeneralfeedback' => (int)$this->reviewgeneralfeedback,
            'reviewrightanswer' => (int)$this->reviewrightanswer,
            'reviewoverallfeedback' => (int)$this->reviewoverallfeedback,
            'questionsperpage' => (int)$this->questionsperpage,
            'navmethod' => (string)$this->navmethod,
            'shuffleanswers' => (int)$this->shuffleanswers,
            'sumgrades' => (float)$this->sumgrades,
            'grade' => (float)$this->grade,
            'timecreated' => (int)$this->timecreated,
            'timemodified' => (int)$this->timemodified,
            'password' => (string)$this->password,
            'subnet' => (string)$this->subnet,
            'browsersecurity' => (string)$this->browsersecurity,
            'delay1' => (int)$this->delay1,
            'delay2' => (int)$this->delay2,
            'showuserpicture' => (int)$this->showuserpicture,
            'showblocks' => (int)$this->showblocks,
            'completionattemptsexhausted' => (int)$this->completionattemptsexhausted,
            'completionminattempts' => (int)$this->completionminattempts,
            'allowofflineattempts' => (int)$this->allowofflineattempts,
        ];
    }

    public function searchableAs()
    {
        return 'quiz_index';
    }
}
