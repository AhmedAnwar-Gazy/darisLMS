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
 * Model RoleAllowView
 * This table stores which which other roles a user is allowed to view to if they have one role.
 */
class RoleAllowView extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'role_allow_view';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'roleid' => 'integer',
        'allowview' => 'integer',
    ];

    // Relationships: BelongsTo
    public function role()
    {
        return $this->belongsTo(Role::class, 'roleid');
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'allowview');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'roleid' => (int)$this->roleid,
            'allowview' => (int)$this->allowview,
        ];
    }

    public function searchableAs()
    {
        return 'role_allow_view_index';
    }
}
