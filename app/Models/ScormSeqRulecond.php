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
 * Model ScormSeqRulecond
 * SCORM2004 rule condition
 */
class ScormSeqRulecond extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'scorm_seq_rulecond';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'scoid' => 'integer',
        'ruleconditionsid' => 'integer',
        'refrencedobjective' => 'string',
        'operator' => 'string',
        'cond' => 'string',
    ];

    // Relationships: BelongsTo
    public function scormScoes()
    {
        return $this->belongsTo(ScormScoes::class, 'scoid');
    }

    public function scormSeqRuleconds()
    {
        return $this->belongsTo(ScormSeqRuleconds::class, 'ruleconditionsid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'scoid' => (int)$this->scoid,
            'ruleconditionsid' => (int)$this->ruleconditionsid,
            'refrencedobjective' => (string)$this->refrencedobjective,
            'measurethreshold' => (string)$this->measurethreshold,
            'operator' => (string)$this->operator,
            'cond' => (string)$this->cond,
        ];
    }

    public function searchableAs()
    {
        return 'scorm_seq_rulecond_index';
    }
}
