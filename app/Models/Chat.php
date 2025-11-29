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
 * Model Chat
 * Each of these is a chat room
 */
class Chat extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'chat';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'course' => 'integer',
        'name' => 'string',
        'intro' => 'string',
        'introformat' => 'integer',
        'keepdays' => 'integer',
        'studentlogs' => 'integer',
        'chattime' => 'integer',
        'schedule' => 'integer',
        'timemodified' => 'integer',
    ];

    // Relationships: HasMany
    public function chatMessagess()
    {
        return $this->hasMany(ChatMessages::class, 'chatid');
    }

    public function chatUserss()
    {
        return $this->hasMany(ChatUsers::class, 'chatid');
    }

    public function chatMessagesCurrents()
    {
        return $this->hasMany(ChatMessagesCurrent::class, 'chatid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'course' => (int)$this->course,
            'name' => (string)$this->name,
            'intro' => (string)$this->intro,
            'introformat' => (int)$this->introformat,
            'keepdays' => (int)$this->keepdays,
            'studentlogs' => (int)$this->studentlogs,
            'chattime' => (int)$this->chattime,
            'schedule' => (int)$this->schedule,
            'timemodified' => (int)$this->timemodified,
        ];
    }

    public function searchableAs()
    {
        return 'chat_index';
    }
}
