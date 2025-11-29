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
 * Model QuizSlots
 * Stores the question used in a quiz, with the order, and for each question, which page it appears on, and the maximum mark (weight).
 */
class QuizSlots extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'quiz_slots';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'slot' => 'integer',
        'quizid' => 'integer',
        'page' => 'integer',
        'displaynumber' => 'string',
        'requireprevious' => 'integer',
        'maxmark' => 'float',
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
            'slot' => (int)$this->slot,
            'quizid' => (int)$this->quizid,
            'page' => (int)$this->page,
            'displaynumber' => (string)$this->displaynumber,
            'requireprevious' => (int)$this->requireprevious,
            'maxmark' => (float)$this->maxmark,
        ];
    }

    public function searchableAs()
    {
        return 'quiz_slots_index';
    }
}
