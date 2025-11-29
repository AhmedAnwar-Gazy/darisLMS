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
 * Model ToolBrickfieldProcess
 * Queued records to initiate new processing of specific targets
 */
class ToolBrickfieldProcess extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'tool_brickfield_process';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'courseid' => 'integer',
        'item' => 'string',
        'contextid' => 'integer',
        'innercontextid' => 'integer',
        'timecreated' => 'integer',
        'timecompleted' => 'integer',
    ];

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'courseid' => (int)$this->courseid,
            'item' => (string)$this->item,
            'contextid' => (int)$this->contextid,
            'innercontextid' => (int)$this->innercontextid,
            'timecreated' => (int)$this->timecreated,
            'timecompleted' => (int)$this->timecompleted,
        ];
    }

    public function searchableAs()
    {
        return 'tool_brickfield_process_index';
    }
}
