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
 * Model MessageEmailMessages
 * Keeps track of what emails to send in an email digest
 */
class MessageEmailMessages extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'message_email_messages';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'useridto' => 'integer',
        'conversationid' => 'integer',
        'messageid' => 'integer',
    ];

    // Relationships: BelongsTo
    public function user()
    {
        return $this->belongsTo(User::class, 'useridto');
    }

    public function messageConversations()
    {
        return $this->belongsTo(MessageConversations::class, 'conversationid');
    }

    public function messages()
    {
        return $this->belongsTo(Messages::class, 'messageid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'useridto' => (int)$this->useridto,
            'conversationid' => (int)$this->conversationid,
            'messageid' => (int)$this->messageid,
        ];
    }

    public function searchableAs()
    {
        return 'message_email_messages_index';
    }
}
