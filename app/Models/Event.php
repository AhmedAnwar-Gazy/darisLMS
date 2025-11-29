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
 * Model Event
 * For everything with a time associated to it
 */
class Event extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'event';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'description' => 'string',
        'format' => 'integer',
        'categoryid' => 'integer',
        'courseid' => 'integer',
        'groupid' => 'integer',
        'userid' => 'integer',
        'repeatid' => 'integer',
        'component' => 'string',
        'modulename' => 'string',
        'instance' => 'integer',
        'type' => 'integer',
        'eventtype' => 'string',
        'timestart' => 'integer',
        'timeduration' => 'integer',
        'timesort' => 'integer',
        'visible' => 'integer',
        'uuid' => 'string',
        'sequence' => 'integer',
        'timemodified' => 'integer',
        'subscriptionid' => 'integer',
        'priority' => 'integer',
        'location' => 'string',
    ];

    // Relationships: BelongsTo
    public function courseCategories()
    {
        return $this->belongsTo(CourseCategories::class, 'categoryid');
    }

    public function eventSubscriptions()
    {
        return $this->belongsTo(EventSubscriptions::class, 'subscriptionid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'name' => (string)$this->name,
            'description' => (string)$this->description,
            'format' => (int)$this->format,
            'categoryid' => (int)$this->categoryid,
            'courseid' => (int)$this->courseid,
            'groupid' => (int)$this->groupid,
            'userid' => (int)$this->userid,
            'repeatid' => (int)$this->repeatid,
            'component' => (string)$this->component,
            'modulename' => (string)$this->modulename,
            'instance' => (int)$this->instance,
            'type' => (int)$this->type,
            'eventtype' => (string)$this->eventtype,
            'timestart' => (int)$this->timestart,
            'timeduration' => (int)$this->timeduration,
            'timesort' => (int)$this->timesort,
            'visible' => (int)$this->visible,
            'uuid' => (string)$this->uuid,
            'sequence' => (int)$this->sequence,
            'timemodified' => (int)$this->timemodified,
            'subscriptionid' => (int)$this->subscriptionid,
            'priority' => (int)$this->priority,
            'location' => (string)$this->location,
        ];
    }

    public function searchableAs()
    {
        return 'event_index';
    }
}
