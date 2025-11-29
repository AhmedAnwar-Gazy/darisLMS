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
 * Model Favourite
 * Stores the relationship between an arbitrary item (itemtype, itemid), and a context area (component, contextid) for a specific user. Used by the favourites subsystem.
 */
class Favourite extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'favourite';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'component' => 'string',
        'itemtype' => 'string',
        'itemid' => 'integer',
        'contextid' => 'integer',
        'userid' => 'integer',
        'ordering' => 'integer',
        'timecreated' => 'integer',
        'timemodified' => 'integer',
    ];

    // Relationships: BelongsTo
    public function context()
    {
        return $this->belongsTo(Context::class, 'contextid');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'userid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'component' => (string)$this->component,
            'itemtype' => (string)$this->itemtype,
            'itemid' => (int)$this->itemid,
            'contextid' => (int)$this->contextid,
            'userid' => (int)$this->userid,
            'ordering' => (int)$this->ordering,
            'timecreated' => (int)$this->timecreated,
            'timemodified' => (int)$this->timemodified,
        ];
    }

    public function searchableAs()
    {
        return 'favourite_index';
    }
}
