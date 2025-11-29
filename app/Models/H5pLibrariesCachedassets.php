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
 * Model H5pLibrariesCachedassets
 * H5P cached library assets
 */
class H5pLibrariesCachedassets extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'h5p_libraries_cachedassets';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'libraryid' => 'integer',
        'hash' => 'string',
    ];

    // Relationships: BelongsTo
    public function h5pLibraries()
    {
        return $this->belongsTo(H5pLibraries::class, 'libraryid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'libraryid' => (int)$this->libraryid,
            'hash' => (string)$this->hash,
        ];
    }

    public function searchableAs()
    {
        return 'h5p_libraries_cachedassets_index';
    }
}
