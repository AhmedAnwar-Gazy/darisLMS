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
 * Model BackupLogs
 * To store all the logs from backup and restore operations (by db logger)
 */
class BackupLogs extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'backup_logs';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'backupid' => 'string',
        'loglevel' => 'integer',
        'message' => 'string',
        'timecreated' => 'integer',
    ];

    // Relationships: BelongsTo
    public function backupControllers()
    {
        return $this->belongsTo(BackupControllers::class, 'backupid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'backupid' => (string)$this->backupid,
            'loglevel' => (int)$this->loglevel,
            'message' => (string)$this->message,
            'timecreated' => (int)$this->timecreated,
        ];
    }

    public function searchableAs()
    {
        return 'backup_logs_index';
    }
}
