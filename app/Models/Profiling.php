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
 * Model Profiling
 * Stores the results of all the profiling runs
 */
class Profiling extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'profiling';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'runid' => 'string',
        'url' => 'string',
        'data' => 'string',
        'totalexecutiontime' => 'integer',
        'totalcputime' => 'integer',
        'totalcalls' => 'integer',
        'totalmemory' => 'integer',
        'runreference' => 'integer',
        'runcomment' => 'string',
        'timecreated' => 'integer',
    ];

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'runid' => (string)$this->runid,
            'url' => (string)$this->url,
            'data' => (string)$this->data,
            'totalexecutiontime' => (int)$this->totalexecutiontime,
            'totalcputime' => (int)$this->totalcputime,
            'totalcalls' => (int)$this->totalcalls,
            'totalmemory' => (int)$this->totalmemory,
            'runreference' => (int)$this->runreference,
            'runcomment' => (string)$this->runcomment,
            'timecreated' => (int)$this->timecreated,
        ];
    }

    public function searchableAs()
    {
        return 'profiling_index';
    }
}
