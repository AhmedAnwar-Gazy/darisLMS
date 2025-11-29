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
 * Model ToolUsertoursSteps
 * Steps in an tour
 */
class ToolUsertoursSteps extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'tool_usertours_steps';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'tourid' => 'integer',
        'title' => 'string',
        'content' => 'string',
        'contentformat' => 'integer',
        'targettype' => 'integer',
        'targetvalue' => 'string',
        'sortorder' => 'integer',
        'configdata' => 'string',
    ];

    // Relationships: BelongsTo
    public function toolUsertoursTours()
    {
        return $this->belongsTo(ToolUsertoursTours::class, 'tourid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'tourid' => (int)$this->tourid,
            'title' => (string)$this->title,
            'content' => (string)$this->content,
            'contentformat' => (int)$this->contentformat,
            'targettype' => (int)$this->targettype,
            'targetvalue' => (string)$this->targetvalue,
            'sortorder' => (int)$this->sortorder,
            'configdata' => (string)$this->configdata,
        ];
    }

    public function searchableAs()
    {
        return 'tool_usertours_steps_index';
    }
}
