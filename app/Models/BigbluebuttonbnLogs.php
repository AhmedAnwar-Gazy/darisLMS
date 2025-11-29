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
 * Model BigbluebuttonbnLogs
 * The bigbluebuttonbn table to store meeting activity events
 */
class BigbluebuttonbnLogs extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'bigbluebuttonbn_logs';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'courseid' => 'integer',
        'bigbluebuttonbnid' => 'integer',
        'userid' => 'integer',
        'timecreated' => 'integer',
        'meetingid' => 'string',
        'log' => 'string',
        'meta' => 'string',
    ];

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'courseid' => (int)$this->courseid,
            'bigbluebuttonbnid' => (int)$this->bigbluebuttonbnid,
            'userid' => (int)$this->userid,
            'timecreated' => (int)$this->timecreated,
            'meetingid' => (string)$this->meetingid,
            'log' => (string)$this->log,
            'meta' => (string)$this->meta,
        ];
    }

    public function searchableAs()
    {
        return 'bigbluebuttonbn_logs_index';
    }
}
