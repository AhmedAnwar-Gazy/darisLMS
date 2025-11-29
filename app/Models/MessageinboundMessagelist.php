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
 * Model MessageinboundMessagelist
 * A list of message IDs for existing replies
 */
class MessageinboundMessagelist extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'messageinbound_messagelist';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'messageid' => 'string',
        'userid' => 'integer',
        'address' => 'string',
        'timecreated' => 'integer',
    ];

    // Relationships: BelongsTo
    public function user()
    {
        return $this->belongsTo(User::class, 'userid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'messageid' => (string)$this->messageid,
            'userid' => (int)$this->userid,
            'address' => (string)$this->address,
            'timecreated' => (int)$this->timecreated,
        ];
    }

    public function searchableAs()
    {
        return 'messageinbound_messagelist_index';
    }
}
