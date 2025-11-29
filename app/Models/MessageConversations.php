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
 * Model MessageConversations
 * Stores all message conversations
 */
class MessageConversations extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'message_conversations';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'type' => 'integer',
        'name' => 'string',
        'convhash' => 'string',
        'component' => 'string',
        'itemtype' => 'string',
        'itemid' => 'integer',
        'contextid' => 'integer',
        'enabled' => 'boolean',
        'timecreated' => 'integer',
        'timemodified' => 'integer',
    ];

    // Relationships: BelongsTo
    public function context()
    {
        return $this->belongsTo(Context::class, 'contextid');
    }

    // Relationships: HasMany
    public function messageConversationMemberss()
    {
        return $this->hasMany(MessageConversationMembers::class, 'conversationid');
    }

    public function messageConversationActionss()
    {
        return $this->hasMany(MessageConversationActions::class, 'conversationid');
    }

    public function messagess()
    {
        return $this->hasMany(Messages::class, 'conversationid');
    }

    public function messageEmailMessagess()
    {
        return $this->hasMany(MessageEmailMessages::class, 'conversationid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'type' => (int)$this->type,
            'name' => (string)$this->name,
            'convhash' => (string)$this->convhash,
            'component' => (string)$this->component,
            'itemtype' => (string)$this->itemtype,
            'itemid' => (int)$this->itemid,
            'contextid' => (int)$this->contextid,
            'enabled' => (int)$this->enabled,
            'timecreated' => (int)$this->timecreated,
            'timemodified' => (int)$this->timemodified,
        ];
    }

    public function searchableAs()
    {
        return 'message_conversations_index';
    }
}
