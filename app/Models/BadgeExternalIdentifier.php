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
 * Model BadgeExternalIdentifier
 * Setting for external badges mappings
 */
class BadgeExternalIdentifier extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'badge_external_identifier';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'sitebackpackid' => 'integer',
        'internalid' => 'string',
        'externalid' => 'string',
        'type' => 'string',
    ];

    // Relationships: BelongsTo
    public function badgeBackpack()
    {
        return $this->belongsTo(BadgeBackpack::class, 'sitebackpackid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'sitebackpackid' => (int)$this->sitebackpackid,
            'internalid' => (string)$this->internalid,
            'externalid' => (string)$this->externalid,
            'type' => (string)$this->type,
        ];
    }

    public function searchableAs()
    {
        return 'badge_external_identifier_index';
    }
}
