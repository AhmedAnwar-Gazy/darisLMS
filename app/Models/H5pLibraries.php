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
 * Model H5pLibraries
 * Stores information about libraries used by H5P content.
 */
class H5pLibraries extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'h5p_libraries';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'machinename' => 'string',
        'title' => 'string',
        'majorversion' => 'integer',
        'minorversion' => 'integer',
        'patchversion' => 'integer',
        'runnable' => 'boolean',
        'fullscreen' => 'boolean',
        'embedtypes' => 'string',
        'preloadedjs' => 'string',
        'preloadedcss' => 'string',
        'droplibrarycss' => 'string',
        'semantics' => 'string',
        'addto' => 'string',
        'coremajor' => 'integer',
        'coreminor' => 'integer',
        'metadatasettings' => 'string',
        'tutorial' => 'string',
        'example' => 'string',
        'enabled' => 'boolean',
    ];

    // Relationships: HasMany
    public function h5ps()
    {
        return $this->hasMany(H5p::class, 'mainlibraryid');
    }

    public function h5pLibraryDependenciess()
    {
        return $this->hasMany(H5pLibraryDependencies::class, 'libraryid');
    }

    public function h5pLibraryDependenciess()
    {
        return $this->hasMany(H5pLibraryDependencies::class, 'requiredlibraryid');
    }

    public function h5pLibrariesCachedassetss()
    {
        return $this->hasMany(H5pLibrariesCachedassets::class, 'libraryid');
    }

    public function h5pContentsLibrariess()
    {
        return $this->hasMany(H5pContentsLibraries::class, 'libraryid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'machinename' => (string)$this->machinename,
            'title' => (string)$this->title,
            'majorversion' => (int)$this->majorversion,
            'minorversion' => (int)$this->minorversion,
            'patchversion' => (int)$this->patchversion,
            'runnable' => (int)$this->runnable,
            'fullscreen' => (int)$this->fullscreen,
            'embedtypes' => (string)$this->embedtypes,
            'preloadedjs' => (string)$this->preloadedjs,
            'preloadedcss' => (string)$this->preloadedcss,
            'droplibrarycss' => (string)$this->droplibrarycss,
            'semantics' => (string)$this->semantics,
            'addto' => (string)$this->addto,
            'coremajor' => (int)$this->coremajor,
            'coreminor' => (int)$this->coreminor,
            'metadatasettings' => (string)$this->metadatasettings,
            'tutorial' => (string)$this->tutorial,
            'example' => (string)$this->example,
            'enabled' => (int)$this->enabled,
        ];
    }

    public function searchableAs()
    {
        return 'h5p_libraries_index';
    }
}
