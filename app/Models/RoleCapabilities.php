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
 * Model RoleCapabilities
 * permission has to be signed, overriding a capability for a particular role in a particular context
 */
class RoleCapabilities extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'role_capabilities';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'contextid' => 'integer',
        'roleid' => 'integer',
        'capability' => 'string',
        'permission' => 'integer',
        'timemodified' => 'integer',
        'modifierid' => 'integer',
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
        return $this->belongsTo(User::class, 'modifierid');
    }

    public function capabilities()
    {
        return $this->belongsTo(Capabilities::class, 'capability');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'contextid' => (int)$this->contextid,
            'roleid' => (int)$this->roleid,
            'capability' => (string)$this->capability,
            'permission' => (int)$this->permission,
            'timemodified' => (int)$this->timemodified,
            'modifierid' => (int)$this->modifierid,
        ];
    }

    public function searchableAs()
    {
        return 'role_capabilities_index';
    }
}
