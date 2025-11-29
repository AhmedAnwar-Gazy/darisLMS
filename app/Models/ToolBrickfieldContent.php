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
 * Model ToolBrickfieldContent
 * Content of an area at a particular time (recognised by a hash)
 */
class ToolBrickfieldContent extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'tool_brickfield_content';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'areaid' => 'integer',
        'contenthash' => 'string',
        'iscurrent' => 'boolean',
        'status' => 'integer',
        'timecreated' => 'integer',
        'timechecked' => 'integer',
    ];

    // Relationships: BelongsTo
    public function toolBrickfieldAreas()
    {
        return $this->belongsTo(ToolBrickfieldAreas::class, 'areaid');
    }

    // Relationships: HasMany
    public function toolBrickfieldResultss()
    {
        return $this->hasMany(ToolBrickfieldResults::class, 'contentid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'areaid' => (int)$this->areaid,
            'contenthash' => (string)$this->contenthash,
            'iscurrent' => (int)$this->iscurrent,
            'status' => (int)$this->status,
            'timecreated' => (int)$this->timecreated,
            'timechecked' => (int)$this->timechecked,
        ];
    }

    public function searchableAs()
    {
        return 'tool_brickfield_content_index';
    }
}
