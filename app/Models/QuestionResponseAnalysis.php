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
 * Model QuestionResponseAnalysis
 * Analysis of student responses given to questions.
 */
class QuestionResponseAnalysis extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'question_response_analysis';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'hashcode' => 'string',
        'whichtries' => 'string',
        'timemodified' => 'integer',
        'questionid' => 'integer',
        'variant' => 'integer',
        'subqid' => 'string',
        'aid' => 'string',
        'response' => 'string',
        'credit' => 'float',
    ];

    // Relationships: BelongsTo
    public function question()
    {
        return $this->belongsTo(Question::class, 'questionid');
    }

    // Relationships: HasMany
    public function questionResponseCounts()
    {
        return $this->hasMany(QuestionResponseCount::class, 'analysisid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'hashcode' => (string)$this->hashcode,
            'whichtries' => (string)$this->whichtries,
            'timemodified' => (int)$this->timemodified,
            'questionid' => (int)$this->questionid,
            'variant' => (int)$this->variant,
            'subqid' => (string)$this->subqid,
            'aid' => (string)$this->aid,
            'response' => (string)$this->response,
            'credit' => (float)$this->credit,
        ];
    }

    public function searchableAs()
    {
        return 'question_response_analysis_index';
    }
}
