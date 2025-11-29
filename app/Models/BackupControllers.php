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
 * Model BackupControllers
 * To store the backup_controllers as they are used
 */
class BackupControllers extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'backup_controllers';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'backupid' => 'string',
        'operation' => 'string',
        'type' => 'string',
        'itemid' => 'integer',
        'format' => 'string',
        'interactive' => 'integer',
        'purpose' => 'integer',
        'userid' => 'integer',
        'status' => 'integer',
        'execution' => 'integer',
        'executiontime' => 'integer',
        'checksum' => 'string',
        'timecreated' => 'integer',
        'timemodified' => 'integer',
        'progress' => 'float',
        'controller' => 'string',
    ];

    // Relationships: BelongsTo
    public function user()
    {
        return $this->belongsTo(User::class, 'userid');
    }

    // Relationships: HasMany
    public function backupLogss()
    {
        return $this->hasMany(BackupLogs::class, 'backupid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'backupid' => (string)$this->backupid,
            'operation' => (string)$this->operation,
            'type' => (string)$this->type,
            'itemid' => (int)$this->itemid,
            'format' => (string)$this->format,
            'interactive' => (int)$this->interactive,
            'purpose' => (int)$this->purpose,
            'userid' => (int)$this->userid,
            'status' => (int)$this->status,
            'execution' => (int)$this->execution,
            'executiontime' => (int)$this->executiontime,
            'checksum' => (string)$this->checksum,
            'timecreated' => (int)$this->timecreated,
            'timemodified' => (int)$this->timemodified,
            'progress' => (float)$this->progress,
            'controller' => (string)$this->controller,
        ];
    }

    public function searchableAs()
    {
        return 'backup_controllers_index';
    }
}
