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
 * Model ToolBrickfieldCacheCheck
 * Contains accessibility summary information per check.
 */
class ToolBrickfieldCacheCheck extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'tool_brickfield_cache_check';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'courseid' => 'integer',
        'status' => 'boolean',
        'checkid' => 'integer',
        'checkcount' => 'integer',
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
            'checkid' => (int)$this->checkid,
            'checkcount' => (int)$this->checkcount,
            'errorcount' => (int)$this->errorcount,
        ];
    }

    public function searchableAs()
    {
        return 'tool_brickfield_cache_check_index';
    }
}
