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
 * Model GroupingsGroups
 * Link a grouping to a group (note, groups can be in multiple groupings ONLY in a course). WAS: groups_groupings_groups
 */
class GroupingsGroups extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'groupings_groups';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'groupingid' => 'integer',
        'groupid' => 'integer',
        'timeadded' => 'integer',
    ];

    // Relationships: BelongsTo
    public function groupings()
    {
        return $this->belongsTo(Groupings::class, 'groupingid');
    }

    public function groups()
    {
        return $this->belongsTo(Groups::class, 'groupid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'groupingid' => (int)$this->groupingid,
            'groupid' => (int)$this->groupid,
            'timeadded' => (int)$this->timeadded,
        ];
    }

    public function searchableAs()
    {
        return 'groupings_groups_index';
    }
}
