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
 * Model QuizFeedback
 * Feedback given to students based on which grade band their overall score lies.
 */
class QuizFeedback extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'quiz_feedback';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'quizid' => 'integer',
        'feedbacktext' => 'string',
        'feedbacktextformat' => 'integer',
        'mingrade' => 'float',
        'maxgrade' => 'float',
    ];

    // Relationships: BelongsTo
    public function quiz()
    {
        return $this->belongsTo(Quiz::class, 'quizid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'quizid' => (int)$this->quizid,
            'feedbacktext' => (string)$this->feedbacktext,
            'feedbacktextformat' => (int)$this->feedbacktextformat,
            'mingrade' => (float)$this->mingrade,
            'maxgrade' => (float)$this->maxgrade,
        ];
    }

    public function searchableAs()
    {
        return 'quiz_feedback_index';
    }
}
