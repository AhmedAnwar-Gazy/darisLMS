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
 * Model LogQueries
 * Logged database queries.
 */
class LogQueries extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'log_queries';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'qtype' => 'integer',
        'sqltext' => 'string',
        'sqlparams' => 'string',
        'error' => 'integer',
        'info' => 'string',
        'backtrace' => 'string',
        'exectime' => 'float',
        'timelogged' => 'integer',
    ];

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'qtype' => (int)$this->qtype,
            'sqltext' => (string)$this->sqltext,
            'sqlparams' => (string)$this->sqlparams,
            'error' => (int)$this->error,
            'info' => (string)$this->info,
            'backtrace' => (string)$this->backtrace,
            'exectime' => (float)$this->exectime,
            'timelogged' => (int)$this->timelogged,
        ];
    }

    public function searchableAs()
    {
        return 'log_queries_index';
    }
}
