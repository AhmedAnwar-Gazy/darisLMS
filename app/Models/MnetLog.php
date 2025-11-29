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
 * Model MnetLog
 * Store session data from users migrating to other sites
 */
class MnetLog extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'mnet_log';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'hostid' => 'integer',
        'remoteid' => 'integer',
        'time' => 'integer',
        'userid' => 'integer',
        'ip' => 'string',
        'course' => 'integer',
        'coursename' => 'string',
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
            'hostid' => (int)$this->hostid,
            'remoteid' => (int)$this->remoteid,
            'time' => (int)$this->time,
            'userid' => (int)$this->userid,
            'ip' => (string)$this->ip,
            'course' => (int)$this->course,
            'coursename' => (string)$this->coursename,
            'module' => (string)$this->module,
            'cmid' => (int)$this->cmid,
            'action' => (string)$this->action,
            'url' => (string)$this->url,
            'info' => (string)$this->info,
        ];
    }

    public function searchableAs()
    {
        return 'mnet_log_index';
    }
}
