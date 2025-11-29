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
 * Model ToolBrickfieldSchedule
 * Keeps the per course content analysis schedule.
 */
class ToolBrickfieldSchedule extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'tool_brickfield_schedule';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'contextlevel' => 'integer',
        'instanceid' => 'integer',
        'contextid' => 'integer',
        'status' => 'integer',
        'timeanalyzed' => 'integer',
        'timemodified' => 'integer',
    ];

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'contextlevel' => (int)$this->contextlevel,
            'instanceid' => (int)$this->instanceid,
            'contextid' => (int)$this->contextid,
            'status' => (int)$this->status,
            'timeanalyzed' => (int)$this->timeanalyzed,
            'timemodified' => (int)$this->timemodified,
        ];
    }

    public function searchableAs()
    {
        return 'tool_brickfield_schedule_index';
    }
}
