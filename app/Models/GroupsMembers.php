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
 * Model GroupsMembers
 * Link a user to a group.
 */
class GroupsMembers extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'groups_members';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'groupid' => 'integer',
        'userid' => 'integer',
        'timeadded' => 'integer',
        'component' => 'string',
        'itemid' => 'integer',
    ];

    // Relationships: BelongsTo
    public function groups()
    {
        return $this->belongsTo(Groups::class, 'groupid');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'userid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'groupid' => (int)$this->groupid,
            'userid' => (int)$this->userid,
            'timeadded' => (int)$this->timeadded,
            'component' => (string)$this->component,
            'itemid' => (int)$this->itemid,
        ];
    }

    public function searchableAs()
    {
        return 'groups_members_index';
    }
}
