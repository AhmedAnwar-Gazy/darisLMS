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
 * Model TaskAdhoc
 * List of adhoc tasks waiting to run.
 */
class TaskAdhoc extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'task_adhoc';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'component' => 'string',
        'classname' => 'string',
        'nextruntime' => 'integer',
        'faildelay' => 'integer',
        'customdata' => 'string',
        'userid' => 'integer',
        'blocking' => 'integer',
        'timecreated' => 'integer',
        'timestarted' => 'integer',
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
            'component' => (string)$this->component,
            'classname' => (string)$this->classname,
            'nextruntime' => (int)$this->nextruntime,
            'faildelay' => (int)$this->faildelay,
            'customdata' => (string)$this->customdata,
            'userid' => (int)$this->userid,
            'blocking' => (int)$this->blocking,
            'timecreated' => (int)$this->timecreated,
            'timestarted' => (int)$this->timestarted,
            'hostname' => (string)$this->hostname,
            'pid' => (int)$this->pid,
        ];
    }

    public function searchableAs()
    {
        return 'task_adhoc_index';
    }
}
