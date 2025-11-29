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
 * Model H5pContentsLibraries
 * Store which library is used in which content.
 */
class H5pContentsLibraries extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'h5p_contents_libraries';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'h5pid' => 'integer',
        'libraryid' => 'integer',
        'dependencytype' => 'string',
        'dropcss' => 'boolean',
        'weight' => 'integer',
    ];

    // Relationships: BelongsTo
    public function h5p()
    {
        return $this->belongsTo(H5p::class, 'h5pid');
    }

    public function h5pLibraries()
    {
        return $this->belongsTo(H5pLibraries::class, 'libraryid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'h5pid' => (int)$this->h5pid,
            'libraryid' => (int)$this->libraryid,
            'dependencytype' => (string)$this->dependencytype,
            'dropcss' => (int)$this->dropcss,
            'weight' => (int)$this->weight,
        ];
    }

    public function searchableAs()
    {
        return 'h5p_contents_libraries_index';
    }
}
