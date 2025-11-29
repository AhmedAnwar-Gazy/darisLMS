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
 * Model BadgeIssued
 * Defines issued badges
 */
class BadgeIssued extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'badge_issued';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'badgeid' => 'integer',
        'userid' => 'integer',
        'uniquehash' => 'string',
        'dateissued' => 'integer',
        'dateexpire' => 'integer',
        'visible' => 'boolean',
        'issuernotified' => 'integer',
    ];

    // Relationships: BelongsTo
    public function badge()
    {
        return $this->belongsTo(Badge::class, 'badgeid');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'userid');
    }

    // Relationships: HasMany
    public function badgeCriteriaMets()
    {
        return $this->hasMany(BadgeCriteriaMet::class, 'issuedid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'badgeid' => (int)$this->badgeid,
            'userid' => (int)$this->userid,
            'uniquehash' => (string)$this->uniquehash,
            'dateissued' => (int)$this->dateissued,
            'dateexpire' => (int)$this->dateexpire,
            'visible' => (int)$this->visible,
            'issuernotified' => (int)$this->issuernotified,
        ];
    }

    public function searchableAs()
    {
        return 'badge_issued_index';
    }
}
