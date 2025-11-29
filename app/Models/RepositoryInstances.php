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
 * Model RepositoryInstances
 * This table contains one entry for every configured external repository instance.
 */
class RepositoryInstances extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'repository_instances';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'typeid' => 'integer',
        'userid' => 'integer',
        'contextid' => 'integer',
        'username' => 'string',
        'password' => 'string',
        'timecreated' => 'integer',
        'timemodified' => 'integer',
        'readonly' => 'boolean',
    ];

    // Relationships: BelongsTo
    public function user()
    {
        return $this->belongsTo(User::class, 'userid');
    }

    public function context()
    {
        return $this->belongsTo(Context::class, 'contextid');
    }

    // Relationships: HasMany
    public function filesReferences()
    {
        return $this->hasMany(FilesReference::class, 'repositoryid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'name' => (string)$this->name,
            'typeid' => (int)$this->typeid,
            'userid' => (int)$this->userid,
            'contextid' => (int)$this->contextid,
            'username' => (string)$this->username,
            'password' => (string)$this->password,
            'timecreated' => (int)$this->timecreated,
            'timemodified' => (int)$this->timemodified,
            'readonly' => (int)$this->readonly,
        ];
    }

    public function searchableAs()
    {
        return 'repository_instances_index';
    }
}
