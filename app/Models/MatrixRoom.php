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
 * Model MatrixRoom
 * Stores the matrix room information associated with the communication instance.
 */
class MatrixRoom extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'matrix_room';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'commid' => 'integer',
        'roomid' => 'string',
        'topic' => 'string',
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
            'roomid' => (string)$this->roomid,
            'topic' => (string)$this->topic,
        ];
    }

    public function searchableAs()
    {
        return 'matrix_room_index';
    }
}
