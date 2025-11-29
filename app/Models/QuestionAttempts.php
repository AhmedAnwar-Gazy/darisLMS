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
 * Model QuestionAttempts
 * Each row here corresponds to an attempt at one question, as part of a question_usage. A question_attempt will have some question_attempt_steps
 */
class QuestionAttempts extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'question_attempts';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'questionusageid' => 'integer',
        'slot' => 'integer',
        'behaviour' => 'string',
        'questionid' => 'integer',
        'variant' => 'integer',
        'maxmark' => 'float',
        'minfraction' => 'float',
        'maxfraction' => 'float',
        'flagged' => 'boolean',
        'questionsummary' => 'string',
        'rightanswer' => 'string',
        'responsesummary' => 'string',
        'timemodified' => 'integer',
    ];

    // Relationships: BelongsTo
    public function question()
    {
        return $this->belongsTo(Question::class, 'questionid');
    }

    public function questionUsages()
    {
        return $this->belongsTo(QuestionUsages::class, 'questionusageid');
    }

    // Relationships: HasMany
    public function questionAttemptStepss()
    {
        return $this->hasMany(QuestionAttemptSteps::class, 'questionattemptid');
    }

    public function quizOverviewRegradess()
    {
        return $this->hasMany(QuizOverviewRegrades::class, 'questionusageid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'questionusageid' => (int)$this->questionusageid,
            'slot' => (int)$this->slot,
            'behaviour' => (string)$this->behaviour,
            'questionid' => (int)$this->questionid,
            'variant' => (int)$this->variant,
            'maxmark' => (float)$this->maxmark,
            'minfraction' => (float)$this->minfraction,
            'maxfraction' => (float)$this->maxfraction,
            'flagged' => (int)$this->flagged,
            'questionsummary' => (string)$this->questionsummary,
            'rightanswer' => (string)$this->rightanswer,
            'responsesummary' => (string)$this->responsesummary,
            'timemodified' => (int)$this->timemodified,
        ];
    }

    public function searchableAs()
    {
        return 'question_attempts_index';
    }
}
