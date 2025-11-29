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
 * Model ToolBrickfieldResults
 * Results of the accessibility checks
 */
class ToolBrickfieldResults extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'tool_brickfield_results';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'contentid' => 'integer',
        'checkid' => 'integer',
        'errorcount' => 'integer',
    ];

    // Relationships: BelongsTo
    public function toolBrickfieldContent()
    {
        return $this->belongsTo(ToolBrickfieldContent::class, 'contentid');
    }

    public function toolBrickfieldChecks()
    {
        return $this->belongsTo(ToolBrickfieldChecks::class, 'checkid');
    }

    // Relationships: HasMany
    public function toolBrickfieldErrorss()
    {
        return $this->hasMany(ToolBrickfieldErrors::class, 'resultid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'contentid' => (int)$this->contentid,
            'checkid' => (int)$this->checkid,
            'errorcount' => (int)$this->errorcount,
        ];
    }

    public function searchableAs()
    {
        return 'tool_brickfield_results_index';
    }
}
