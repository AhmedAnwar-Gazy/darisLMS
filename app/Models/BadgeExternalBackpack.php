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
 * Model BadgeExternalBackpack
 * Defines settings for site level backpacks that a user can connect to.
 */
class BadgeExternalBackpack extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'badge_external_backpack';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'backpackapiurl' => 'string',
        'backpackweburl' => 'string',
        'apiversion' => 'string',
        'sortorder' => 'integer',
        'oauth2_issuerid' => 'integer',
    ];

    // Relationships: BelongsTo
    public function oauth2Issuer()
    {
        return $this->belongsTo(Oauth2Issuer::class, 'oauth2_issuerid');
    }

    // Relationships: HasMany
    public function badgeBackpackOauth2s()
    {
        return $this->hasMany(BadgeBackpackOauth2::class, 'externalbackpackid');
    }

    public function badgeBackpacks()
    {
        return $this->hasMany(BadgeBackpack::class, 'externalbackpackid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'backpackapiurl' => (string)$this->backpackapiurl,
            'backpackweburl' => (string)$this->backpackweburl,
            'apiversion' => (string)$this->apiversion,
            'sortorder' => (int)$this->sortorder,
            'oauth2_issuerid' => (int)$this->oauth2_issuerid,
        ];
    }

    public function searchableAs()
    {
        return 'badge_external_backpack_index';
    }
}
