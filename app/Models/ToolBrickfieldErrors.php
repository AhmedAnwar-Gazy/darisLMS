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
 * Model ToolBrickfieldErrors
 * Errors during the accessibility checks
 */
class ToolBrickfieldErrors extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'tool_brickfield_errors';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'resultid' => 'integer',
        'linenumber' => 'integer',
        'errordata' => 'string',
        'htmlcode' => 'string',
    ];

    // Relationships: BelongsTo
    public function toolBrickfieldResults()
    {
        return $this->belongsTo(ToolBrickfieldResults::class, 'resultid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'resultid' => (int)$this->resultid,
            'linenumber' => (int)$this->linenumber,
            'errordata' => (string)$this->errordata,
            'htmlcode' => (string)$this->htmlcode,
        ];
    }

    public function searchableAs()
    {
        return 'tool_brickfield_errors_index';
    }
}
