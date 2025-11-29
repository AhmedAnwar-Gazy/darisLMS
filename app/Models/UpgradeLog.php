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
 * Model UpgradeLog
 * Upgrade logging
 */
class UpgradeLog extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'upgrade_log';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'type' => 'integer',
        'plugin' => 'string',
        'version' => 'string',
        'targetversion' => 'string',
        'info' => 'string',
        'details' => 'string',
        'backtrace' => 'string',
        'userid' => 'integer',
        'timemodified' => 'integer',
    ];

    // Relationships: BelongsTo
    public function user()
    {
        return $this->belongsTo(User::class, 'userid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'type' => (int)$this->type,
            'plugin' => (string)$this->plugin,
            'version' => (string)$this->version,
            'targetversion' => (string)$this->targetversion,
            'info' => (string)$this->info,
            'details' => (string)$this->details,
            'backtrace' => (string)$this->backtrace,
            'userid' => (int)$this->userid,
            'timemodified' => (int)$this->timemodified,
        ];
    }

    public function searchableAs()
    {
        return 'upgrade_log_index';
    }
}
