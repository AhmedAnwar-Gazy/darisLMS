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
 * Model MessageinboundDatakeys
 * Inbound Message data item secret keys.
 */
class MessageinboundDatakeys extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'messageinbound_datakeys';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'handler' => 'integer',
        'datavalue' => 'integer',
        'datakey' => 'string',
        'timecreated' => 'integer',
        'expires' => 'integer',
    ];

    // Relationships: BelongsTo
    public function messageinboundHandlers()
    {
        return $this->belongsTo(MessageinboundHandlers::class, 'handler');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'handler' => (int)$this->handler,
            'datavalue' => (int)$this->datavalue,
            'datakey' => (string)$this->datakey,
            'timecreated' => (int)$this->timecreated,
            'expires' => (int)$this->expires,
        ];
    }

    public function searchableAs()
    {
        return 'messageinbound_datakeys_index';
    }
}
