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
 * Model H5pLibraryDependencies
 * Stores H5P library dependencies
 */
class H5pLibraryDependencies extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'h5p_library_dependencies';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'libraryid' => 'integer',
        'requiredlibraryid' => 'integer',
        'dependencytype' => 'string',
    ];

    // Relationships: BelongsTo
    public function h5pLibraries()
    {
        return $this->belongsTo(H5pLibraries::class, 'libraryid');
    }

    public function h5pLibraries()
    {
        return $this->belongsTo(H5pLibraries::class, 'requiredlibraryid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'libraryid' => (int)$this->libraryid,
            'requiredlibraryid' => (int)$this->requiredlibraryid,
            'dependencytype' => (string)$this->dependencytype,
        ];
    }

    public function searchableAs()
    {
        return 'h5p_library_dependencies_index';
    }
}
