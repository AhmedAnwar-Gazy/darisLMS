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
 * Model ToolMonitorHistory
 * Table to store history of message notifications sent
 */
class ToolMonitorHistory extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'tool_monitor_history';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'sid' => 'integer',
        'userid' => 'integer',
        'timesent' => 'integer',
    ];

    // Relationships: BelongsTo
    public function toolMonitorSubscriptions()
    {
        return $this->belongsTo(ToolMonitorSubscriptions::class, 'sid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'sid' => (int)$this->sid,
            'userid' => (int)$this->userid,
            'timesent' => (int)$this->timesent,
        ];
    }

    public function searchableAs()
    {
        return 'tool_monitor_history_index';
    }
}
