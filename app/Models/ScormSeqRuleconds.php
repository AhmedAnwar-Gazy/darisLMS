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
 * Model ScormSeqRuleconds
 * SCORM2004 rule conditions
 */
class ScormSeqRuleconds extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'scorm_seq_ruleconds';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'scoid' => 'integer',
        'conditioncombination' => 'string',
        'ruletype' => 'integer',
        'action' => 'string',
    ];

    // Relationships: BelongsTo
    public function scormScoes()
    {
        return $this->belongsTo(ScormScoes::class, 'scoid');
    }

    // Relationships: HasMany
    public function scormSeqRuleconds()
    {
        return $this->hasMany(ScormSeqRulecond::class, 'ruleconditionsid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'scoid' => (int)$this->scoid,
            'conditioncombination' => (string)$this->conditioncombination,
            'ruletype' => (int)$this->ruletype,
            'action' => (string)$this->action,
        ];
    }

    public function searchableAs()
    {
        return 'scorm_seq_ruleconds_index';
    }
}
