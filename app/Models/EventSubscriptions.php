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
 * Model EventSubscriptions
 * Tracks subscriptions to remote calendars.
 */
class EventSubscriptions extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'event_subscriptions';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'url' => 'string',
        'categoryid' => 'integer',
        'courseid' => 'integer',
        'groupid' => 'integer',
        'userid' => 'integer',
        'eventtype' => 'string',
        'pollinterval' => 'integer',
        'lastupdated' => 'integer',
        'name' => 'string',
    ];

    // Relationships: BelongsTo
    public function course()
    {
        return $this->belongsTo(Course::class, 'courseid');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'userid');
    }

    // Relationships: HasMany
    public function events()
    {
        return $this->hasMany(Event::class, 'subscriptionid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'url' => (string)$this->url,
            'categoryid' => (int)$this->categoryid,
            'courseid' => (int)$this->courseid,
            'groupid' => (int)$this->groupid,
            'userid' => (int)$this->userid,
            'eventtype' => (string)$this->eventtype,
            'pollinterval' => (int)$this->pollinterval,
            'lastupdated' => (int)$this->lastupdated,
            'name' => (string)$this->name,
        ];
    }

    public function searchableAs()
    {
        return 'event_subscriptions_index';
    }
}
