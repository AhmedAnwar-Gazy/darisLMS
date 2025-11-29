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
 * Model QtypeMatchSubquestions
 * The subquestions that make up a matching question
 */
class QtypeMatchSubquestions extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'qtype_match_subquestions';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'questionid' => 'integer',
        'questiontext' => 'string',
        'questiontextformat' => 'integer',
        'answertext' => 'string',
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
            'questiontext' => (string)$this->questiontext,
            'questiontextformat' => (int)$this->questiontextformat,
            'answertext' => (string)$this->answertext,
        ];
    }

    public function searchableAs()
    {
        return 'qtype_match_subquestions_index';
    }
}
