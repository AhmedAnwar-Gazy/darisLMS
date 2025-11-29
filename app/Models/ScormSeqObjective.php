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
 * Model ScormSeqObjective
 * SCORM2004 objective description
 */
class ScormSeqObjective extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'scorm_seq_objective';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'scoid' => 'integer',
        'primaryobj' => 'boolean',
        'objectiveid' => 'string',
        'satisfiedbymeasure' => 'boolean',
    ];

    // Relationships: BelongsTo
    public function scormScoes()
    {
        return $this->belongsTo(ScormScoes::class, 'scoid');
    }

    // Relationships: HasMany
    public function scormSeqMapinfos()
    {
        return $this->hasMany(ScormSeqMapinfo::class, 'objectiveid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'scoid' => (int)$this->scoid,
            'primaryobj' => (int)$this->primaryobj,
            'objectiveid' => (string)$this->objectiveid,
            'satisfiedbymeasure' => (int)$this->satisfiedbymeasure,
            'minnormalizedmeasure' => (string)$this->minnormalizedmeasure,
        ];
    }

    public function searchableAs()
    {
        return 'scorm_seq_objective_index';
    }
}
