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
 * Model CommunicationCustomlink
 * Stores the link associated with a custom link communication instance.
 */
class CommunicationCustomlink extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'communication_customlink';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'commid' => 'integer',
        'url' => 'string',
    ];

    // Relationships: BelongsTo
    public function communication()
    {
        return $this->belongsTo(Communication::class, 'commid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'commid' => (int)$this->commid,
            'url' => (string)$this->url,
        ];
    }

    public function searchableAs()
    {
        return 'communication_customlink_index';
    }
}
