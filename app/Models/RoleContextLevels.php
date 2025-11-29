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
 * Model RoleContextLevels
 * Lists which roles can be assigned at which context levels. The assignment is allowed in the corresponding row is present in this table.
 */
class RoleContextLevels extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'role_context_levels';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'roleid' => 'integer',
        'contextlevel' => 'integer',
    ];

    // Relationships: BelongsTo
    public function role()
    {
        return $this->belongsTo(Role::class, 'roleid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'roleid' => (int)$this->roleid,
            'contextlevel' => (int)$this->contextlevel,
        ];
    }

    public function searchableAs()
    {
        return 'role_context_levels_index';
    }
}
