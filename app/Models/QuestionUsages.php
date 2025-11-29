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
 * Model QuestionUsages
 * This table's main purpose it to assign a unique id to each attempt at a set of questions by some part of Moodle. A question usage is made up of a number of question_attempts.
 */
class QuestionUsages extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'question_usages';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'contextid' => 'integer',
        'component' => 'string',
        'preferredbehaviour' => 'string',
    ];

    // Relationships: BelongsTo
    public function context()
    {
        return $this->belongsTo(Context::class, 'contextid');
    }

    // Relationships: HasMany
    public function questionAttemptss()
    {
        return $this->hasMany(QuestionAttempts::class, 'questionusageid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'contextid' => (int)$this->contextid,
            'component' => (string)$this->component,
            'preferredbehaviour' => (string)$this->preferredbehaviour,
        ];
    }

    public function searchableAs()
    {
        return 'question_usages_index';
    }
}
