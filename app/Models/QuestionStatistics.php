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
 * Model QuestionStatistics
 * Statistics for individual questions used in an activity.
 */
class QuestionStatistics extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'question_statistics';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'hashcode' => 'string',
        'timemodified' => 'integer',
        'questionid' => 'integer',
        'slot' => 'integer',
        'subquestion' => 'integer',
        'variant' => 'integer',
        's' => 'integer',
        'effectiveweight' => 'float',
        'negcovar' => 'integer',
        'discriminationindex' => 'float',
        'discriminativeefficiency' => 'float',
        'sd' => 'float',
        'facility' => 'float',
        'subquestions' => 'string',
        'maxmark' => 'float',
        'positions' => 'string',
        'randomguessscore' => 'float',
    ];

    // Relationships: BelongsTo
    public function question()
    {
        return $this->belongsTo(Question::class, 'questionid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'hashcode' => (string)$this->hashcode,
            'timemodified' => (int)$this->timemodified,
            'questionid' => (int)$this->questionid,
            'slot' => (int)$this->slot,
            'subquestion' => (int)$this->subquestion,
            'variant' => (int)$this->variant,
            's' => (int)$this->s,
            'effectiveweight' => (float)$this->effectiveweight,
            'negcovar' => (int)$this->negcovar,
            'discriminationindex' => (float)$this->discriminationindex,
            'discriminativeefficiency' => (float)$this->discriminativeefficiency,
            'sd' => (float)$this->sd,
            'facility' => (float)$this->facility,
            'subquestions' => (string)$this->subquestions,
            'maxmark' => (float)$this->maxmark,
            'positions' => (string)$this->positions,
            'randomguessscore' => (float)$this->randomguessscore,
        ];
    }

    public function searchableAs()
    {
        return 'question_statistics_index';
    }
}
