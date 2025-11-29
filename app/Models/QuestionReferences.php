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
 * Model QuestionReferences
 * Records where a specific question is used.
 */
class QuestionReferences extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'question_references';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'usingcontextid' => 'integer',
        'component' => 'string',
        'questionarea' => 'string',
        'itemid' => 'integer',
        'questionbankentryid' => 'integer',
        'version' => 'integer',
    ];

    // Relationships: BelongsTo
    public function context()
    {
        return $this->belongsTo(Context::class, 'usingcontextid');
    }

    public function questionBankEntries()
    {
        return $this->belongsTo(QuestionBankEntries::class, 'questionbankentryid');
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
            'questionbankentryid' => (int)$this->questionbankentryid,
            'version' => (int)$this->version,
        ];
    }

    public function searchableAs()
    {
        return 'question_references_index';
    }
}
