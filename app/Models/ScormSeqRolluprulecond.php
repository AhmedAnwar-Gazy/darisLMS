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
 * Model ScormSeqRolluprulecond
 * SCORM2004 sequencing rule
 */
class ScormSeqRolluprulecond extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'scorm_seq_rolluprulecond';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'scoid' => 'integer',
        'rollupruleid' => 'integer',
        'operator' => 'string',
        'cond' => 'string',
    ];

    // Relationships: BelongsTo
    public function scormScoes()
    {
        return $this->belongsTo(ScormScoes::class, 'scoid');
    }

    public function scormSeqRolluprule()
    {
        return $this->belongsTo(ScormSeqRolluprule::class, 'rollupruleid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'scoid' => (int)$this->scoid,
            'rollupruleid' => (int)$this->rollupruleid,
            'operator' => (string)$this->operator,
            'cond' => (string)$this->cond,
        ];
    }

    public function searchableAs()
    {
        return 'scorm_seq_rolluprulecond_index';
    }
}
