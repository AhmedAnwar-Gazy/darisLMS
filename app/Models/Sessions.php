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
 * Model Sessions
 * Database based session storage - now recommended
 */
class Sessions extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'sessions';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'state' => 'integer',
        'sid' => 'string',
        'userid' => 'integer',
        'sessdata' => 'string',
        'timecreated' => 'integer',
        'timemodified' => 'integer',
        'firstip' => 'string',
        'lastip' => 'string',
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
            'state' => (int)$this->state,
            'sid' => (string)$this->sid,
            'userid' => (int)$this->userid,
            'sessdata' => (string)$this->sessdata,
            'timecreated' => (int)$this->timecreated,
            'timemodified' => (int)$this->timemodified,
            'firstip' => (string)$this->firstip,
            'lastip' => (string)$this->lastip,
        ];
    }

    public function searchableAs()
    {
        return 'sessions_index';
    }
}
