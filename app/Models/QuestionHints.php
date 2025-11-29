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
 * Model QuestionHints
 * Stores the the part of the question definition that gives different feedback after each try in interactive and similar behaviours.
 */
class QuestionHints extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'question_hints';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'questionid' => 'integer',
        'hint' => 'string',
        'hintformat' => 'integer',
        'shownumcorrect' => 'boolean',
        'clearwrong' => 'boolean',
        'options' => 'string',
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
            'questionid' => (int)$this->questionid,
            'hint' => (string)$this->hint,
            'hintformat' => (int)$this->hintformat,
            'shownumcorrect' => (int)$this->shownumcorrect,
            'clearwrong' => (int)$this->clearwrong,
            'options' => (string)$this->options,
        ];
    }

    public function searchableAs()
    {
        return 'question_hints_index';
    }
}
