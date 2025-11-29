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
 * Model SurveyAnswers
 * the answers to each questions filled by the users
 */
class SurveyAnswers extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'survey_answers';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'userid' => 'integer',
        'survey' => 'integer',
        'question' => 'integer',
        'time' => 'integer',
        'answer1' => 'string',
        'answer2' => 'string',
    ];

    // Relationships: BelongsTo
    public function surveyRelation()
    {
        return $this->belongsTo(Survey::class, 'survey');
    }

    public function surveyQuestions()
    {
        return $this->belongsTo(SurveyQuestions::class, 'question');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'userid' => (int)$this->userid,
            'survey' => (int)$this->survey,
            'question' => (int)$this->question,
            'time' => (int)$this->time,
            'answer1' => (string)$this->answer1,
            'answer2' => (string)$this->answer2,
        ];
    }

    public function searchableAs()
    {
        return 'survey_answers_index';
    }
}
