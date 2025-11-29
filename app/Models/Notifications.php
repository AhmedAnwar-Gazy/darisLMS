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
 * Model Notifications
 * Stores all notifications
 */
class Notifications extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'notifications';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'useridfrom' => 'integer',
        'useridto' => 'integer',
        'subject' => 'string',
        'fullmessage' => 'string',
        'fullmessageformat' => 'boolean',
        'fullmessagehtml' => 'string',
        'smallmessage' => 'string',
        'component' => 'string',
        'eventtype' => 'string',
        'contexturl' => 'string',
        'contexturlname' => 'string',
        'timeread' => 'integer',
        'timecreated' => 'integer',
        'customdata' => 'string',
    ];

    // Relationships: BelongsTo
    public function user()
    {
        return $this->belongsTo(User::class, 'useridto');
    }

    // Relationships: HasMany
    public function messagePopupNotificationss()
    {
        return $this->hasMany(MessagePopupNotifications::class, 'notificationid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'useridfrom' => (int)$this->useridfrom,
            'useridto' => (int)$this->useridto,
            'subject' => (string)$this->subject,
            'fullmessage' => (string)$this->fullmessage,
            'fullmessageformat' => (int)$this->fullmessageformat,
            'fullmessagehtml' => (string)$this->fullmessagehtml,
            'smallmessage' => (string)$this->smallmessage,
            'component' => (string)$this->component,
            'eventtype' => (string)$this->eventtype,
            'contexturl' => (string)$this->contexturl,
            'contexturlname' => (string)$this->contexturlname,
            'timeread' => (int)$this->timeread,
            'timecreated' => (int)$this->timecreated,
            'customdata' => (string)$this->customdata,
        ];
    }

    public function searchableAs()
    {
        return 'notifications_index';
    }
}
