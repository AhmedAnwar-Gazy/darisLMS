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
 * Model BlockRecentActivity
 * Recent activity block
 */
class BlockRecentActivity extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'block_recent_activity';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'courseid' => 'integer',
        'cmid' => 'integer',
        'timecreated' => 'integer',
        'userid' => 'integer',
        'action' => 'boolean',
        'modname' => 'string',
    ];

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'courseid' => (int)$this->courseid,
            'cmid' => (int)$this->cmid,
            'timecreated' => (int)$this->timecreated,
            'userid' => (int)$this->userid,
            'action' => (int)$this->action,
            'modname' => (string)$this->modname,
        ];
    }

    public function searchableAs()
    {
        return 'block_recent_activity_index';
    }
}
