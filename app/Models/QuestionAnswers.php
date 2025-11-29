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
 * Model QuestionAnswers
 * Answers, with a fractional grade (0-1) and feedback
 */
class QuestionAnswers extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'question_answers';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'question' => 'integer',
        'answer' => 'string',
        'answerformat' => 'integer',
        'fraction' => 'float',
        'feedback' => 'string',
        'feedbackformat' => 'integer',
    ];

    // Relationships: BelongsTo
    public function questionRelation()
    {
        return $this->belongsTo(Question::class, 'question');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'question' => (int)$this->question,
            'answer' => (string)$this->answer,
            'answerformat' => (int)$this->answerformat,
            'fraction' => (float)$this->fraction,
            'feedback' => (string)$this->feedback,
            'feedbackformat' => (int)$this->feedbackformat,
        ];
    }

    public function searchableAs()
    {
        return 'question_answers_index';
    }
}
