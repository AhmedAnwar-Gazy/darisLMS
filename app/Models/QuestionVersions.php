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
 * Model QuestionVersions
 * A join table linking the different question version definitions in the question table to the question_bank_entires.
 */
class QuestionVersions extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'question_versions';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'questionbankentryid' => 'integer',
        'version' => 'integer',
        'questionid' => 'integer',
        'status' => 'string',
    ];

    // Relationships: BelongsTo
    public function questionBankEntries()
    {
        return $this->belongsTo(QuestionBankEntries::class, 'questionbankentryid');
    }

    public function question()
    {
        return $this->belongsTo(Question::class, 'questionid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'questionbankentryid' => (int)$this->questionbankentryid,
            'version' => (int)$this->version,
            'questionid' => (int)$this->questionid,
            'status' => (string)$this->status,
        ];
    }

    public function searchableAs()
    {
        return 'question_versions_index';
    }
}
