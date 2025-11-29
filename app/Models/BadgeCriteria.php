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
 * Model BadgeCriteria
 * Defines criteria for issuing badges
 */
class BadgeCriteria extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'badge_criteria';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'badgeid' => 'integer',
        'criteriatype' => 'integer',
        'method' => 'boolean',
        'description' => 'string',
        'descriptionformat' => 'integer',
    ];

    // Relationships: BelongsTo
    public function badge()
    {
        return $this->belongsTo(Badge::class, 'badgeid');
    }

    // Relationships: HasMany
    public function badgeCriteriaMets()
    {
        return $this->hasMany(BadgeCriteriaMet::class, 'critid');
    }

    public function badgeCriteriaParams()
    {
        return $this->hasMany(BadgeCriteriaParam::class, 'critid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'badgeid' => (int)$this->badgeid,
            'criteriatype' => (int)$this->criteriatype,
            'method' => (int)$this->method,
            'description' => (string)$this->description,
            'descriptionformat' => (int)$this->descriptionformat,
        ];
    }

    public function searchableAs()
    {
        return 'badge_criteria_index';
    }
}
