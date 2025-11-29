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
 * Model BlockInstances
 * This table stores block instances. The type of block this is is given by the blockname column. The places this block instance appears is controlled by the parentcontexid, showinsubcontexts, pagetypepattern and subpagepattern fields. Where the block appears on the page (by default) is controlled by the defaultposition and defaultweight columns. The block's own configuration is stored serialized in configdata.
 */
class BlockInstances extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'block_instances';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'blockname' => 'string',
        'parentcontextid' => 'integer',
        'showinsubcontexts' => 'integer',
        'requiredbytheme' => 'integer',
        'pagetypepattern' => 'string',
        'subpagepattern' => 'string',
        'defaultregion' => 'string',
        'defaultweight' => 'integer',
        'configdata' => 'string',
        'timecreated' => 'integer',
        'timemodified' => 'integer',
    ];

    // Relationships: BelongsTo
    public function context()
    {
        return $this->belongsTo(Context::class, 'parentcontextid');
    }

    // Relationships: HasMany
    public function blockPositionss()
    {
        return $this->hasMany(BlockPositions::class, 'blockinstanceid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'blockname' => (string)$this->blockname,
            'parentcontextid' => (int)$this->parentcontextid,
            'showinsubcontexts' => (int)$this->showinsubcontexts,
            'requiredbytheme' => (int)$this->requiredbytheme,
            'pagetypepattern' => (string)$this->pagetypepattern,
            'subpagepattern' => (string)$this->subpagepattern,
            'defaultregion' => (string)$this->defaultregion,
            'defaultweight' => (int)$this->defaultweight,
            'configdata' => (string)$this->configdata,
            'timecreated' => (int)$this->timecreated,
            'timemodified' => (int)$this->timemodified,
        ];
    }

    public function searchableAs()
    {
        return 'block_instances_index';
    }
}
