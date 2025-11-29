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
 * Model WikiLocks
 * Manages page locks
 */
class WikiLocks extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'wiki_locks';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'pageid' => 'integer',
        'sectionname' => 'string',
        'userid' => 'integer',
        'lockedat' => 'integer',
    ];

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'pageid' => (int)$this->pageid,
            'sectionname' => (string)$this->sectionname,
            'userid' => (int)$this->userid,
            'lockedat' => (int)$this->lockedat,
        ];
    }

    public function searchableAs()
    {
        return 'wiki_locks_index';
    }
}
