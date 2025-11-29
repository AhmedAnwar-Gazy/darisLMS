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
 * Model EventsQueueHandlers
 * This is the list of queued handlers for processing. The event object is retrieved from the events_queue table. When no further reference is made to the event_queues table, the corresponding entry in the events_queue table should be deleted. Entry should get deleted after a successful event processing by the specified handler.
 */
class EventsQueueHandlers extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'events_queue_handlers';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'queuedeventid' => 'integer',
        'handlerid' => 'integer',
        'status' => 'integer',
        'errormessage' => 'string',
        'timemodified' => 'integer',
    ];

    // Relationships: BelongsTo
    public function eventsQueue()
    {
        return $this->belongsTo(EventsQueue::class, 'queuedeventid');
    }

    public function eventsHandlers()
    {
        return $this->belongsTo(EventsHandlers::class, 'handlerid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'queuedeventid' => (int)$this->queuedeventid,
            'handlerid' => (int)$this->handlerid,
            'status' => (int)$this->status,
            'errormessage' => (string)$this->errormessage,
            'timemodified' => (int)$this->timemodified,
        ];
    }

    public function searchableAs()
    {
        return 'events_queue_handlers_index';
    }
}
