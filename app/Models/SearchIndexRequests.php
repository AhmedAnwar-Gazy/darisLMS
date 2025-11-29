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
 * Model SearchIndexRequests
 * Records requests for (re)indexing of specific contexts. Entries will be removed from this table when indexing of that context is complete. (This table is not used for normal time-based indexing of new content.)
 */
class SearchIndexRequests extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'search_index_requests';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'contextid' => 'integer',
        'searcharea' => 'string',
        'timerequested' => 'integer',
        'partialarea' => 'string',
        'partialtime' => 'integer',
        'indexpriority' => 'integer',
    ];

    // Relationships: BelongsTo
    public function context()
    {
        return $this->belongsTo(Context::class, 'contextid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'contextid' => (int)$this->contextid,
            'searcharea' => (string)$this->searcharea,
            'timerequested' => (int)$this->timerequested,
            'partialarea' => (string)$this->partialarea,
            'partialtime' => (int)$this->partialtime,
            'indexpriority' => (int)$this->indexpriority,
        ];
    }

    public function searchableAs()
    {
        return 'search_index_requests_index';
    }
}
