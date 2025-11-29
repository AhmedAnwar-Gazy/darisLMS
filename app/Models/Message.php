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
 * Model Message
 * Stores all unread messages
 */
class Message extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'message';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'useridfrom' => 'integer',
        'useridto' => 'integer',
        'subject' => 'string',
        'fullmessage' => 'string',
        'fullmessageformat' => 'integer',
        'fullmessagehtml' => 'string',
        'smallmessage' => 'string',
        'notification' => 'boolean',
        'contexturl' => 'string',
        'contexturlname' => 'string',
        'timecreated' => 'integer',
        'timeuserfromdeleted' => 'integer',
        'timeusertodeleted' => 'integer',
        'component' => 'string',
        'eventtype' => 'string',
        'customdata' => 'string',
    ];

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
            'notification' => (int)$this->notification,
            'contexturl' => (string)$this->contexturl,
            'contexturlname' => (string)$this->contexturlname,
            'timecreated' => (int)$this->timecreated,
            'timeuserfromdeleted' => (int)$this->timeuserfromdeleted,
            'timeusertodeleted' => (int)$this->timeusertodeleted,
            'component' => (string)$this->component,
            'eventtype' => (string)$this->eventtype,
            'customdata' => (string)$this->customdata,
        ];
    }

    public function searchableAs()
    {
        return 'message_index';
    }
}
