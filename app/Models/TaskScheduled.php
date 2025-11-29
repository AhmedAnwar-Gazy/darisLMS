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
 * Model TaskScheduled
 * List of scheduled tasks to be run by cron.
 */
class TaskScheduled extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'task_scheduled';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'component' => 'string',
        'classname' => 'string',
        'lastruntime' => 'integer',
        'nextruntime' => 'integer',
        'blocking' => 'integer',
        'minute' => 'string',
        'hour' => 'string',
        'day' => 'string',
        'month' => 'string',
        'dayofweek' => 'string',
        'faildelay' => 'integer',
        'customised' => 'integer',
        'disabled' => 'boolean',
        'timestarted' => 'integer',
        'hostname' => 'string',
        'pid' => 'integer',
    ];

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'component' => (string)$this->component,
            'classname' => (string)$this->classname,
            'lastruntime' => (int)$this->lastruntime,
            'nextruntime' => (int)$this->nextruntime,
            'blocking' => (int)$this->blocking,
            'minute' => (string)$this->minute,
            'hour' => (string)$this->hour,
            'day' => (string)$this->day,
            'month' => (string)$this->month,
            'dayofweek' => (string)$this->dayofweek,
            'faildelay' => (int)$this->faildelay,
            'customised' => (int)$this->customised,
            'disabled' => (int)$this->disabled,
            'timestarted' => (int)$this->timestarted,
            'hostname' => (string)$this->hostname,
            'pid' => (int)$this->pid,
        ];
    }

    public function searchableAs()
    {
        return 'task_scheduled_index';
    }
}
