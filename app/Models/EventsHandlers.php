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
 * Model EventsHandlers
 * This table is for storing which components requests what type of event, and the location of the responsible handlers. For example, the assignment registers 'grade_updated' event with a function assignment_grade_handler() that should be called event time an 'grade_updated' event is triggered by grade_update() function.
 */
class EventsHandlers extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'events_handlers';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'eventname' => 'string',
        'component' => 'string',
        'handlerfile' => 'string',
        'handlerfunction' => 'string',
        'schedule' => 'string',
        'status' => 'integer',
        'internal' => 'integer',
    ];

    // Relationships: HasMany
    public function eventsQueueHandlerss()
    {
        return $this->hasMany(EventsQueueHandlers::class, 'handlerid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'eventname' => (string)$this->eventname,
            'component' => (string)$this->component,
            'handlerfile' => (string)$this->handlerfile,
            'handlerfunction' => (string)$this->handlerfunction,
            'schedule' => (string)$this->schedule,
            'status' => (int)$this->status,
            'internal' => (int)$this->internal,
        ];
    }

    public function searchableAs()
    {
        return 'events_handlers_index';
    }
}
