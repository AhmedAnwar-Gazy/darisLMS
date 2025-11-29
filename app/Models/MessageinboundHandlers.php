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
 * Model MessageinboundHandlers
 * Inbound Message Handler definitions.
 */
class MessageinboundHandlers extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'messageinbound_handlers';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'component' => 'string',
        'classname' => 'string',
        'defaultexpiration' => 'integer',
        'validateaddress' => 'boolean',
        'enabled' => 'boolean',
    ];

    // Relationships: HasMany
    public function messageinboundDatakeyss()
    {
        return $this->hasMany(MessageinboundDatakeys::class, 'handler');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'component' => (string)$this->component,
            'classname' => (string)$this->classname,
            'defaultexpiration' => (int)$this->defaultexpiration,
            'validateaddress' => (int)$this->validateaddress,
            'enabled' => (int)$this->enabled,
        ];
    }

    public function searchableAs()
    {
        return 'messageinbound_handlers_index';
    }
}
