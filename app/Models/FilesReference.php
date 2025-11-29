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
 * Model FilesReference
 * Store files references
 */
class FilesReference extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'files_reference';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'repositoryid' => 'integer',
        'lastsync' => 'integer',
        'reference' => 'string',
        'referencehash' => 'string',
    ];

    // Relationships: BelongsTo
    public function repositoryInstances()
    {
        return $this->belongsTo(RepositoryInstances::class, 'repositoryid');
    }

    // Relationships: HasMany
    public function filess()
    {
        return $this->hasMany(Files::class, 'referencefileid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'repositoryid' => (int)$this->repositoryid,
            'lastsync' => (int)$this->lastsync,
            'reference' => (string)$this->reference,
            'referencehash' => (string)$this->referencehash,
        ];
    }

    public function searchableAs()
    {
        return 'files_reference_index';
    }
}
