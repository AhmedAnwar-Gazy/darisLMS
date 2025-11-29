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
 * Model CacheFlags
 * Cache of time-sensitive flags
 */
class CacheFlags extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'cache_flags';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'flagtype' => 'string',
        'name' => 'string',
        'timemodified' => 'integer',
        'value' => 'string',
        'expiry' => 'integer',
    ];

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'flagtype' => (string)$this->flagtype,
            'name' => (string)$this->name,
            'timemodified' => (int)$this->timemodified,
            'value' => (string)$this->value,
            'expiry' => (int)$this->expiry,
        ];
    }

    public function searchableAs()
    {
        return 'cache_flags_index';
    }
}
