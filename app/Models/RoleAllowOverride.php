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
 * Model RoleAllowOverride
 * this defines what role can override what role
 */
class RoleAllowOverride extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'role_allow_override';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'roleid' => 'integer',
        'allowoverride' => 'integer',
    ];

    // Relationships: BelongsTo
    public function role()
    {
        return $this->belongsTo(Role::class, 'roleid');
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'allowoverride');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'roleid' => (int)$this->roleid,
            'allowoverride' => (int)$this->allowoverride,
        ];
    }

    public function searchableAs()
    {
        return 'role_allow_override_index';
    }
}
