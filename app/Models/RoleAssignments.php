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
 * Model RoleAssignments
 * assigning roles in different context
 */
class RoleAssignments extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'role_assignments';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'roleid' => 'integer',
        'contextid' => 'integer',
        'userid' => 'integer',
        'timemodified' => 'integer',
        'modifierid' => 'integer',
        'component' => 'string',
        'itemid' => 'integer',
        'sortorder' => 'integer',
    ];

    // Relationships: BelongsTo
    public function role()
    {
        return $this->belongsTo(Role::class, 'roleid');
    }

    public function context()
    {
        return $this->belongsTo(Context::class, 'contextid');
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
            'roleid' => (int)$this->roleid,
            'contextid' => (int)$this->contextid,
            'userid' => (int)$this->userid,
            'timemodified' => (int)$this->timemodified,
            'modifierid' => (int)$this->modifierid,
            'component' => (string)$this->component,
            'itemid' => (int)$this->itemid,
            'sortorder' => (int)$this->sortorder,
        ];
    }

    public function searchableAs()
    {
        return 'role_assignments_index';
    }
}
