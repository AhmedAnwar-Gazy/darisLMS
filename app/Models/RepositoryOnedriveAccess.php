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
 * Model RepositoryOnedriveAccess
 * List of temporary access grants.
 */
class RepositoryOnedriveAccess extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'repository_onedrive_access';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'timemodified' => 'integer',
        'timecreated' => 'integer',
        'usermodified' => 'integer',
        'permissionid' => 'string',
        'itemid' => 'string',
    ];

    // Relationships: BelongsTo
    public function user()
    {
        return $this->belongsTo(User::class, 'usermodified');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'timemodified' => (int)$this->timemodified,
            'timecreated' => (int)$this->timecreated,
            'usermodified' => (int)$this->usermodified,
            'permissionid' => (string)$this->permissionid,
            'itemid' => (string)$this->itemid,
        ];
    }

    public function searchableAs()
    {
        return 'repository_onedrive_access_index';
    }
}
