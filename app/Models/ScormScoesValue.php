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
 * Model ScormScoesValue
 * Values passed from SCORM package
 */
class ScormScoesValue extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'scorm_scoes_value';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'scoid' => 'integer',
        'attemptid' => 'integer',
        'elementid' => 'integer',
        'value' => 'string',
        'timemodified' => 'integer',
    ];

    // Relationships: BelongsTo
    public function scormScoes()
    {
        return $this->belongsTo(ScormScoes::class, 'scoid');
    }

    public function scormAttempt()
    {
        return $this->belongsTo(ScormAttempt::class, 'attemptid');
    }

    public function scormElement()
    {
        return $this->belongsTo(ScormElement::class, 'elementid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'scoid' => (int)$this->scoid,
            'attemptid' => (int)$this->attemptid,
            'elementid' => (int)$this->elementid,
            'value' => (string)$this->value,
            'timemodified' => (int)$this->timemodified,
        ];
    }

    public function searchableAs()
    {
        return 'scorm_scoes_value_index';
    }
}
