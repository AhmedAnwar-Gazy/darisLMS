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
 * Model Messages
 * Stores all messages
 */
class Messages extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'messages';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'useridfrom' => 'integer',
        'conversationid' => 'integer',
        'subject' => 'string',
        'fullmessage' => 'string',
        'fullmessageformat' => 'boolean',
        'fullmessagehtml' => 'string',
        'smallmessage' => 'string',
        'timecreated' => 'integer',
        'fullmessagetrust' => 'integer',
        'customdata' => 'string',
    ];

    // Relationships: BelongsTo
    public function user()
    {
        return $this->belongsTo(User::class, 'useridfrom');
    }

    public function messageConversations()
    {
        return $this->belongsTo(MessageConversations::class, 'conversationid');
    }

    // Relationships: HasMany
    public function messageUserActionss()
    {
        return $this->hasMany(MessageUserActions::class, 'messageid');
    }

    public function messageEmailMessagess()
    {
        return $this->hasMany(MessageEmailMessages::class, 'messageid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'useridfrom' => (int)$this->useridfrom,
            'conversationid' => (int)$this->conversationid,
            'subject' => (string)$this->subject,
            'fullmessage' => (string)$this->fullmessage,
            'fullmessageformat' => (int)$this->fullmessageformat,
            'fullmessagehtml' => (string)$this->fullmessagehtml,
            'smallmessage' => (string)$this->smallmessage,
            'timecreated' => (int)$this->timecreated,
            'fullmessagetrust' => (int)$this->fullmessagetrust,
            'customdata' => (string)$this->customdata,
        ];
    }

    public function searchableAs()
    {
        return 'messages_index';
    }
}
