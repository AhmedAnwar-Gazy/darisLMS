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
 * Model TaskLog
 * The log table for all tasks
 */
class TaskLog extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'task_log';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'type' => 'integer',
        'component' => 'string',
        'classname' => 'string',
        'userid' => 'integer',
        'timestart' => 'float',
        'timeend' => 'float',
        'dbreads' => 'integer',
        'dbwrites' => 'integer',
        'result' => 'integer',
        'output' => 'string',
        'hostname' => 'string',
        'pid' => 'integer',
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
            'component' => (string)$this->component,
            'classname' => (string)$this->classname,
            'userid' => (int)$this->userid,
            'timestart' => (float)$this->timestart,
            'timeend' => (float)$this->timeend,
            'dbreads' => (int)$this->dbreads,
            'dbwrites' => (int)$this->dbwrites,
            'result' => (int)$this->result,
            'output' => (string)$this->output,
            'hostname' => (string)$this->hostname,
            'pid' => (int)$this->pid,
        ];
    }

    public function searchableAs()
    {
        return 'task_log_index';
    }
}
