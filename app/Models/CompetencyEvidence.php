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
 * Model CompetencyEvidence
 * The evidence linked to a user competency
 */
class CompetencyEvidence extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'competency_evidence';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'usercompetencyid' => 'integer',
        'contextid' => 'integer',
        'action' => 'integer',
        'actionuserid' => 'integer',
        'descidentifier' => 'string',
        'desccomponent' => 'string',
        'desca' => 'string',
        'url' => 'string',
        'grade' => 'integer',
        'note' => 'string',
        'timecreated' => 'integer',
        'timemodified' => 'integer',
        'usermodified' => 'integer',
    ];

    // Relationships: BelongsTo
    public function context()
    {
        return $this->belongsTo(Context::class, 'contextid');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'actionuserid');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'usermodified');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'usercompetencyid' => (int)$this->usercompetencyid,
            'contextid' => (int)$this->contextid,
            'action' => (int)$this->action,
            'actionuserid' => (int)$this->actionuserid,
            'descidentifier' => (string)$this->descidentifier,
            'desccomponent' => (string)$this->desccomponent,
            'desca' => (string)$this->desca,
            'url' => (string)$this->url,
            'grade' => (int)$this->grade,
            'note' => (string)$this->note,
            'timecreated' => (int)$this->timecreated,
            'timemodified' => (int)$this->timemodified,
            'usermodified' => (int)$this->usermodified,
        ];
    }

    public function searchableAs()
    {
        return 'competency_evidence_index';
    }
}
