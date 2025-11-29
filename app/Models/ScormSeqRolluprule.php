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
 * Model ScormSeqRolluprule
 * SCORM2004 sequencing rule
 */
class ScormSeqRolluprule extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'scorm_seq_rolluprule';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'scoid' => 'integer',
        'childactivityset' => 'string',
        'minimumcount' => 'integer',
        'conditioncombination' => 'string',
        'action' => 'string',
    ];

    // Relationships: BelongsTo
    public function scormScoes()
    {
        return $this->belongsTo(ScormScoes::class, 'scoid');
    }

    // Relationships: HasMany
    public function scormSeqRollupruleconds()
    {
        return $this->hasMany(ScormSeqRolluprulecond::class, 'rollupruleid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'scoid' => (int)$this->scoid,
            'childactivityset' => (string)$this->childactivityset,
            'minimumcount' => (int)$this->minimumcount,
            'minimumpercent' => (string)$this->minimumpercent,
            'conditioncombination' => (string)$this->conditioncombination,
            'action' => (string)$this->action,
        ];
    }

    public function searchableAs()
    {
        return 'scorm_seq_rolluprule_index';
    }
}
