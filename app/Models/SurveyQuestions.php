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
 * Model SurveyQuestions
 * the questions conforming one survey
 */
class SurveyQuestions extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'survey_questions';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'text' => 'string',
        'shorttext' => 'string',
        'multi' => 'string',
        'intro' => 'string',
        'type' => 'integer',
        'options' => 'string',
    ];

    // Relationships: HasMany
    public function surveyAnswerss()
    {
        return $this->hasMany(SurveyAnswers::class, 'question');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'text' => (string)$this->text,
            'shorttext' => (string)$this->shorttext,
            'multi' => (string)$this->multi,
            'intro' => (string)$this->intro,
            'type' => (int)$this->type,
            'options' => (string)$this->options,
        ];
    }

    public function searchableAs()
    {
        return 'survey_questions_index';
    }
}
