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
 * Model BadgeAlignment
 * Defines alignment for badges
 */
class BadgeAlignment extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'badge_alignment';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'badgeid' => 'integer',
        'targetname' => 'string',
        'targeturl' => 'string',
        'targetdescription' => 'string',
        'targetframework' => 'string',
        'targetcode' => 'string',
    ];

    // Relationships: BelongsTo
    public function badge()
    {
        return $this->belongsTo(Badge::class, 'badgeid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'badgeid' => (int)$this->badgeid,
            'targetname' => (string)$this->targetname,
            'targeturl' => (string)$this->targeturl,
            'targetdescription' => (string)$this->targetdescription,
            'targetframework' => (string)$this->targetframework,
            'targetcode' => (string)$this->targetcode,
        ];
    }

    public function searchableAs()
    {
        return 'badge_alignment_index';
    }
}
