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
 * Model ChatUsers
 * Keeps track of which users are in which chat rooms
 */
class ChatUsers extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'chat_users';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'chatid' => 'integer',
        'userid' => 'integer',
        'groupid' => 'integer',
        'version' => 'string',
        'ip' => 'string',
        'firstping' => 'integer',
        'lastping' => 'integer',
        'lastmessageping' => 'integer',
        'sid' => 'string',
        'course' => 'integer',
        'lang' => 'string',
    ];

    // Relationships: BelongsTo
    public function chat()
    {
        return $this->belongsTo(Chat::class, 'chatid');
    }

    public function courseRelation()
    {
        return $this->belongsTo(Course::class, 'course');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'chatid' => (int)$this->chatid,
            'userid' => (int)$this->userid,
            'groupid' => (int)$this->groupid,
            'version' => (string)$this->version,
            'ip' => (string)$this->ip,
            'firstping' => (int)$this->firstping,
            'lastping' => (int)$this->lastping,
            'lastmessageping' => (int)$this->lastmessageping,
            'sid' => (string)$this->sid,
            'course' => (int)$this->course,
            'lang' => (string)$this->lang,
        ];
    }

    public function searchableAs()
    {
        return 'chat_users_index';
    }
}
