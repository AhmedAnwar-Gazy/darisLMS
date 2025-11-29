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
 * Model ToolBrickfieldCacheActs
 * Contains accessibility summary information per activity.
 */
class ToolBrickfieldCacheActs extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'tool_brickfield_cache_acts';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'courseid' => 'integer',
        'status' => 'boolean',
        'component' => 'string',
        'totalactivities' => 'integer',
        'failedactivities' => 'integer',
        'passedactivities' => 'integer',
        'errorcount' => 'integer',
    ];

    // Relationships: BelongsTo
    public function course()
    {
        return $this->belongsTo(Course::class, 'courseid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'courseid' => (int)$this->courseid,
            'status' => (int)$this->status,
            'component' => (string)$this->component,
            'totalactivities' => (int)$this->totalactivities,
            'failedactivities' => (int)$this->failedactivities,
            'passedactivities' => (int)$this->passedactivities,
            'errorcount' => (int)$this->errorcount,
        ];
    }

    public function searchableAs()
    {
        return 'tool_brickfield_cache_acts_index';
    }
}
