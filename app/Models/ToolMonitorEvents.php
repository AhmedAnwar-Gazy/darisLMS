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
 * Model ToolMonitorEvents
 * A table that keeps a log of events related to subscriptions
 */
class ToolMonitorEvents extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'tool_monitor_events';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'eventname' => 'string',
        'contextid' => 'integer',
        'contextlevel' => 'integer',
        'contextinstanceid' => 'integer',
        'link' => 'string',
        'courseid' => 'integer',
        'timecreated' => 'integer',
    ];

    // Relationships: BelongsTo
    public function course()
    {
        return $this->belongsTo(Course::class, 'courseid');
    }

    public function context()
    {
        return $this->belongsTo(Context::class, 'contextid');
    }

    public function context()
    {
        return $this->belongsTo(Context::class, 'contextinstanceid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'eventname' => (string)$this->eventname,
            'contextid' => (int)$this->contextid,
            'contextlevel' => (int)$this->contextlevel,
            'contextinstanceid' => (int)$this->contextinstanceid,
            'link' => (string)$this->link,
            'courseid' => (int)$this->courseid,
            'timecreated' => (int)$this->timecreated,
        ];
    }

    public function searchableAs()
    {
        return 'tool_monitor_events_index';
    }
}
