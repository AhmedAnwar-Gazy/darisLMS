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
 * Model MessagePopupNotifications
 * List of notifications to display in the message output popup
 */
class MessagePopupNotifications extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'message_popup_notifications';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'notificationid' => 'integer',
    ];

    // Relationships: BelongsTo
    public function notifications()
    {
        return $this->belongsTo(Notifications::class, 'notificationid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'notificationid' => (int)$this->notificationid,
        ];
    }

    public function searchableAs()
    {
        return 'message_popup_notifications_index';
    }
}
