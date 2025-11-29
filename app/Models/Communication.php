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
 * Model Communication
 * Communication records
 */
class Communication extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'communication';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'contextid' => 'integer',
        'instanceid' => 'integer',
        'component' => 'string',
        'instancetype' => 'string',
        'provider' => 'string',
        'roomname' => 'string',
        'avatarfilename' => 'string',
        'active' => 'boolean',
        'avatarsynced' => 'boolean',
    ];

    // Relationships: BelongsTo
    public function context()
    {
        return $this->belongsTo(Context::class, 'contextid');
    }

    // Relationships: HasMany
    public function communicationCustomlinks()
    {
        return $this->hasMany(CommunicationCustomlink::class, 'commid');
    }

    public function communicationUsers()
    {
        return $this->hasMany(CommunicationUser::class, 'commid');
    }

    public function matrixRooms()
    {
        return $this->hasMany(MatrixRoom::class, 'commid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'contextid' => (int)$this->contextid,
            'instanceid' => (int)$this->instanceid,
            'component' => (string)$this->component,
            'instancetype' => (string)$this->instancetype,
            'provider' => (string)$this->provider,
            'roomname' => (string)$this->roomname,
            'avatarfilename' => (string)$this->avatarfilename,
            'active' => (int)$this->active,
            'avatarsynced' => (int)$this->avatarsynced,
        ];
    }

    public function searchableAs()
    {
        return 'communication_index';
    }
}
