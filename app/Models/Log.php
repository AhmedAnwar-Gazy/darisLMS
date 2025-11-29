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
 * Model Log
 * Every action is logged as far as possible
 */
class Log extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'log';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'time' => 'integer',
        'userid' => 'integer',
        'ip' => 'string',
        'course' => 'integer',
        'module' => 'string',
        'cmid' => 'integer',
        'action' => 'string',
        'url' => 'string',
        'info' => 'string',
    ];

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'time' => (int)$this->time,
            'userid' => (int)$this->userid,
            'ip' => (string)$this->ip,
            'course' => (int)$this->course,
            'module' => (string)$this->module,
            'cmid' => (int)$this->cmid,
            'action' => (string)$this->action,
            'url' => (string)$this->url,
            'info' => (string)$this->info,
        ];
    }

    public function searchableAs()
    {
        return 'log_index';
    }
}
