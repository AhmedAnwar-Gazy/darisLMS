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
 * Model LogstoreStandardLog
 * Standard log table
 */
class LogstoreStandardLog extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'logstore_standard_log';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'eventname' => 'string',
        'component' => 'string',
        'action' => 'string',
        'target' => 'string',
        'objecttable' => 'string',
        'objectid' => 'integer',
        'crud' => 'string',
        'edulevel' => 'boolean',
        'contextid' => 'integer',
        'contextlevel' => 'integer',
        'contextinstanceid' => 'integer',
        'userid' => 'integer',
        'courseid' => 'integer',
        'relateduserid' => 'integer',
        'anonymous' => 'boolean',
        'other' => 'string',
        'timecreated' => 'integer',
        'origin' => 'string',
        'ip' => 'string',
        'realuserid' => 'integer',
    ];

    // Relationships: BelongsTo
    public function context()
    {
        return $this->belongsTo(Context::class, 'contextid');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'userid');
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'courseid');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'realuserid');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'relateduserid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'eventname' => (string)$this->eventname,
            'component' => (string)$this->component,
            'action' => (string)$this->action,
            'target' => (string)$this->target,
            'objecttable' => (string)$this->objecttable,
            'objectid' => (int)$this->objectid,
            'crud' => (string)$this->crud,
            'edulevel' => (int)$this->edulevel,
            'contextid' => (int)$this->contextid,
            'contextlevel' => (int)$this->contextlevel,
            'contextinstanceid' => (int)$this->contextinstanceid,
            'userid' => (int)$this->userid,
            'courseid' => (int)$this->courseid,
            'relateduserid' => (int)$this->relateduserid,
            'anonymous' => (int)$this->anonymous,
            'other' => (string)$this->other,
            'timecreated' => (int)$this->timecreated,
            'origin' => (string)$this->origin,
            'ip' => (string)$this->ip,
            'realuserid' => (int)$this->realuserid,
        ];
    }

    public function searchableAs()
    {
        return 'logstore_standard_log_index';
    }
}
