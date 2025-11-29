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
 * Model ToolMonitorSubscriptions
 * Table to store user subscriptions to various rules
 */
class ToolMonitorSubscriptions extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'tool_monitor_subscriptions';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'courseid' => 'integer',
        'ruleid' => 'integer',
        'cmid' => 'integer',
        'userid' => 'integer',
        'timecreated' => 'integer',
        'lastnotificationsent' => 'integer',
        'inactivedate' => 'integer',
    ];

    // Relationships: BelongsTo
    public function toolMonitorRules()
    {
        return $this->belongsTo(ToolMonitorRules::class, 'ruleid');
    }

    // Relationships: HasMany
    public function toolMonitorHistorys()
    {
        return $this->hasMany(ToolMonitorHistory::class, 'sid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'courseid' => (int)$this->courseid,
            'ruleid' => (int)$this->ruleid,
            'cmid' => (int)$this->cmid,
            'userid' => (int)$this->userid,
            'timecreated' => (int)$this->timecreated,
            'lastnotificationsent' => (int)$this->lastnotificationsent,
            'inactivedate' => (int)$this->inactivedate,
        ];
    }

    public function searchableAs()
    {
        return 'tool_monitor_subscriptions_index';
    }
}
