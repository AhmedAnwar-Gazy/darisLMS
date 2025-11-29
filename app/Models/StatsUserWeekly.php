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
 * Model StatsUserWeekly
 * To accumulate weekly stats per course/user
 */
class StatsUserWeekly extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'stats_user_weekly';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'courseid' => 'integer',
        'userid' => 'integer',
        'roleid' => 'integer',
        'timeend' => 'integer',
        'statsreads' => 'integer',
        'statswrites' => 'integer',
        'stattype' => 'string',
    ];

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'courseid' => (int)$this->courseid,
            'userid' => (int)$this->userid,
            'roleid' => (int)$this->roleid,
            'timeend' => (int)$this->timeend,
            'statsreads' => (int)$this->statsreads,
            'statswrites' => (int)$this->statswrites,
            'stattype' => (string)$this->stattype,
        ];
    }

    public function searchableAs()
    {
        return 'stats_user_weekly_index';
    }
}
