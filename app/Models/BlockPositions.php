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
 * Model BlockPositions
 * Stores the position of a sticky block_instance on a another page than the one where it was added.
 */
class BlockPositions extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'block_positions';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'blockinstanceid' => 'integer',
        'contextid' => 'integer',
        'pagetype' => 'string',
        'subpage' => 'string',
        'visible' => 'integer',
        'region' => 'string',
        'weight' => 'integer',
    ];

    // Relationships: BelongsTo
    public function blockInstances()
    {
        return $this->belongsTo(BlockInstances::class, 'blockinstanceid');
    }

    public function context()
    {
        return $this->belongsTo(Context::class, 'contextid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'blockinstanceid' => (int)$this->blockinstanceid,
            'contextid' => (int)$this->contextid,
            'pagetype' => (string)$this->pagetype,
            'subpage' => (string)$this->subpage,
            'visible' => (int)$this->visible,
            'region' => (string)$this->region,
            'weight' => (int)$this->weight,
        ];
    }

    public function searchableAs()
    {
        return 'block_positions_index';
    }
}
