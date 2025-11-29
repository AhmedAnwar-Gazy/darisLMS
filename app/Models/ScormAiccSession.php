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
 * Model ScormAiccSession
 * Used by AICC HACP to store session information
 */
class ScormAiccSession extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'scorm_aicc_session';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'userid' => 'integer',
        'scormid' => 'integer',
        'hacpsession' => 'string',
        'scoid' => 'integer',
        'scormmode' => 'string',
        'scormstatus' => 'string',
        'attempt' => 'integer',
        'lessonstatus' => 'string',
        'sessiontime' => 'string',
        'timecreated' => 'integer',
        'timemodified' => 'integer',
    ];

    // Relationships: BelongsTo
    public function scorm()
    {
        return $this->belongsTo(Scorm::class, 'scormid');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'userid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'userid' => (int)$this->userid,
            'scormid' => (int)$this->scormid,
            'hacpsession' => (string)$this->hacpsession,
            'scoid' => (int)$this->scoid,
            'scormmode' => (string)$this->scormmode,
            'scormstatus' => (string)$this->scormstatus,
            'attempt' => (int)$this->attempt,
            'lessonstatus' => (string)$this->lessonstatus,
            'sessiontime' => (string)$this->sessiontime,
            'timecreated' => (int)$this->timecreated,
            'timemodified' => (int)$this->timemodified,
        ];
    }

    public function searchableAs()
    {
        return 'scorm_aicc_session_index';
    }
}
