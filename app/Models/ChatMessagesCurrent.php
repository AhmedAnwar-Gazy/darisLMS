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
 * Model ChatMessagesCurrent
 * Stores current session
 */
class ChatMessagesCurrent extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'chat_messages_current';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'chatid' => 'integer',
        'userid' => 'integer',
        'groupid' => 'integer',
        'issystem' => 'boolean',
        'message' => 'string',
        'timestamp' => 'integer',
    ];

    // Relationships: BelongsTo
    public function chat()
    {
        return $this->belongsTo(Chat::class, 'chatid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'chatid' => (int)$this->chatid,
            'userid' => (int)$this->userid,
            'groupid' => (int)$this->groupid,
            'issystem' => (int)$this->issystem,
            'message' => (string)$this->message,
            'timestamp' => (int)$this->timestamp,
        ];
    }

    public function searchableAs()
    {
        return 'chat_messages_current_index';
    }
}
