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
 * Model ToolMonitorRules
 * Table to store rules
 */
class ToolMonitorRules extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'tool_monitor_rules';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'description' => 'string',
        'descriptionformat' => 'boolean',
        'name' => 'string',
        'userid' => 'integer',
        'courseid' => 'integer',
        'plugin' => 'string',
        'eventname' => 'string',
        'template' => 'string',
        'templateformat' => 'boolean',
        'frequency' => 'integer',
        'timewindow' => 'integer',
        'timemodified' => 'integer',
        'timecreated' => 'integer',
    ];

    // Relationships: HasMany
    public function toolMonitorSubscriptionss()
    {
        return $this->hasMany(ToolMonitorSubscriptions::class, 'ruleid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'description' => (string)$this->description,
            'descriptionformat' => (int)$this->descriptionformat,
            'name' => (string)$this->name,
            'userid' => (int)$this->userid,
            'courseid' => (int)$this->courseid,
            'plugin' => (string)$this->plugin,
            'eventname' => (string)$this->eventname,
            'template' => (string)$this->template,
            'templateformat' => (int)$this->templateformat,
            'frequency' => (int)$this->frequency,
            'timewindow' => (int)$this->timewindow,
            'timemodified' => (int)$this->timemodified,
            'timecreated' => (int)$this->timecreated,
        ];
    }

    public function searchableAs()
    {
        return 'tool_monitor_rules_index';
    }
}
