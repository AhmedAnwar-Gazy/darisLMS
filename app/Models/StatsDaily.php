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
 * Model StatsDaily
 * to accumulate daily stats
 */
class StatsDaily extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'stats_daily';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'courseid' => 'integer',
        'timeend' => 'integer',
        'roleid' => 'integer',
        'stattype' => 'string',
        'stat1' => 'integer',
        'stat2' => 'integer',
    ];

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'courseid' => (int)$this->courseid,
            'timeend' => (int)$this->timeend,
            'roleid' => (int)$this->roleid,
            'stattype' => (string)$this->stattype,
            'stat1' => (int)$this->stat1,
            'stat2' => (int)$this->stat2,
        ];
    }

    public function searchableAs()
    {
        return 'stats_daily_index';
    }
}
