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
 * Model BadgeRelated
 * Defines badge related for badges
 */
class BadgeRelated extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'badge_related';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'badgeid' => 'integer',
        'relatedbadgeid' => 'integer',
    ];

    // Relationships: BelongsTo
    public function badge()
    {
        return $this->belongsTo(Badge::class, 'badgeid');
    }

    public function badge()
    {
        return $this->belongsTo(Badge::class, 'relatedbadgeid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'badgeid' => (int)$this->badgeid,
            'relatedbadgeid' => (int)$this->relatedbadgeid,
        ];
    }

    public function searchableAs()
    {
        return 'badge_related_index';
    }
}
