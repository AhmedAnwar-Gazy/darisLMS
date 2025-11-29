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
 * Model Survey
 * Each record is one SURVEY module with its configuration
 */
class Survey extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'survey';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'course' => 'integer',
        'template' => 'integer',
        'days' => 'integer',
        'timecreated' => 'integer',
        'timemodified' => 'integer',
        'name' => 'string',
        'intro' => 'string',
        'introformat' => 'integer',
        'questions' => 'string',
        'completionsubmit' => 'boolean',
    ];

    // Relationships: HasMany
    public function surveyAnalysiss()
    {
        return $this->hasMany(SurveyAnalysis::class, 'survey');
    }

    public function surveyAnswerss()
    {
        return $this->hasMany(SurveyAnswers::class, 'survey');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'course' => (int)$this->course,
            'template' => (int)$this->template,
            'days' => (int)$this->days,
            'timecreated' => (int)$this->timecreated,
            'timemodified' => (int)$this->timemodified,
            'name' => (string)$this->name,
            'intro' => (string)$this->intro,
            'introformat' => (int)$this->introformat,
            'questions' => (string)$this->questions,
            'completionsubmit' => (int)$this->completionsubmit,
        ];
    }

    public function searchableAs()
    {
        return 'survey_index';
    }
}
