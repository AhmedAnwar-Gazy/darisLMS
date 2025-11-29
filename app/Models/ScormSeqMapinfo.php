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
 * Model ScormSeqMapinfo
 * SCORM2004 objective mapinfo description
 */
class ScormSeqMapinfo extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'scorm_seq_mapinfo';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'scoid' => 'integer',
        'objectiveid' => 'integer',
        'targetobjectiveid' => 'integer',
        'readsatisfiedstatus' => 'boolean',
        'readnormalizedmeasure' => 'boolean',
        'writesatisfiedstatus' => 'boolean',
        'writenormalizedmeasure' => 'boolean',
    ];

    // Relationships: BelongsTo
    public function scormScoes()
    {
        return $this->belongsTo(ScormScoes::class, 'scoid');
    }

    public function scormSeqObjective()
    {
        return $this->belongsTo(ScormSeqObjective::class, 'objectiveid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'scoid' => (int)$this->scoid,
            'objectiveid' => (int)$this->objectiveid,
            'targetobjectiveid' => (int)$this->targetobjectiveid,
            'readsatisfiedstatus' => (int)$this->readsatisfiedstatus,
            'readnormalizedmeasure' => (int)$this->readnormalizedmeasure,
            'writesatisfiedstatus' => (int)$this->writesatisfiedstatus,
            'writenormalizedmeasure' => (int)$this->writenormalizedmeasure,
        ];
    }

    public function searchableAs()
    {
        return 'scorm_seq_mapinfo_index';
    }
}
