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
 * Model QuestionSetReferences
 * Records where groups of questions are used.
 */
class QuestionSetReferences extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'question_set_references';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'usingcontextid' => 'integer',
        'component' => 'string',
        'questionarea' => 'string',
        'itemid' => 'integer',
        'questionscontextid' => 'integer',
        'filtercondition' => 'string',
    ];

    // Relationships: BelongsTo
    public function context()
    {
        return $this->belongsTo(Context::class, 'usingcontextid');
    }

    public function context()
    {
        return $this->belongsTo(Context::class, 'questionscontextid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'usingcontextid' => (int)$this->usingcontextid,
            'component' => (string)$this->component,
            'questionarea' => (string)$this->questionarea,
            'itemid' => (int)$this->itemid,
            'questionscontextid' => (int)$this->questionscontextid,
            'filtercondition' => (string)$this->filtercondition,
        ];
    }

    public function searchableAs()
    {
        return 'question_set_references_index';
    }
}
