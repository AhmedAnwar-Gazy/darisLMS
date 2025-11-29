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
 * Model QuizSections
 * Stores sections of a quiz with section name (heading), from slot-number N and whether the question order should be shuffled.
 */
class QuizSections extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'quiz_sections';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'quizid' => 'integer',
        'firstslot' => 'integer',
        'heading' => 'string',
        'shufflequestions' => 'integer',
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
            'firstslot' => (int)$this->firstslot,
            'heading' => (string)$this->heading,
            'shufflequestions' => (int)$this->shufflequestions,
        ];
    }

    public function searchableAs()
    {
        return 'quiz_sections_index';
    }
}
