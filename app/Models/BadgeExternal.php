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
 * Model BadgeExternal
 * Setting for external badges display
 */
class BadgeExternal extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'badge_external';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'backpackid' => 'integer',
        'collectionid' => 'integer',
        'entityid' => 'string',
        'assertion' => 'string',
    ];

    // Relationships: BelongsTo
    public function badgeBackpack()
    {
        return $this->belongsTo(BadgeBackpack::class, 'backpackid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'backpackid' => (int)$this->backpackid,
            'collectionid' => (int)$this->collectionid,
            'entityid' => (string)$this->entityid,
            'assertion' => (string)$this->assertion,
        ];
    }

    public function searchableAs()
    {
        return 'badge_external_index';
    }
}
