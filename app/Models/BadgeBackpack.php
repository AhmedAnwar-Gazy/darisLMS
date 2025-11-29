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
 * Model BadgeBackpack
 * Defines settings for connecting external backpack
 */
class BadgeBackpack extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'badge_backpack';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'userid' => 'integer',
        'email' => 'string',
        'backpackuid' => 'integer',
        'autosync' => 'boolean',
        'password' => 'string',
        'externalbackpackid' => 'integer',
    ];

    // Relationships: BelongsTo
    public function user()
    {
        return $this->belongsTo(User::class, 'userid');
    }

    public function badgeExternalBackpack()
    {
        return $this->belongsTo(BadgeExternalBackpack::class, 'externalbackpackid');
    }

    // Relationships: HasMany
    public function badgeExternalIdentifiers()
    {
        return $this->hasMany(BadgeExternalIdentifier::class, 'sitebackpackid');
    }

    public function badgeExternals()
    {
        return $this->hasMany(BadgeExternal::class, 'backpackid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'userid' => (int)$this->userid,
            'email' => (string)$this->email,
            'backpackuid' => (int)$this->backpackuid,
            'autosync' => (int)$this->autosync,
            'password' => (string)$this->password,
            'externalbackpackid' => (int)$this->externalbackpackid,
        ];
    }

    public function searchableAs()
    {
        return 'badge_backpack_index';
    }
}
