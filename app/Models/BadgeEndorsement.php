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
 * Model BadgeEndorsement
 * Defines endorsement for badge
 */
class BadgeEndorsement extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'badge_endorsement';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'badgeid' => 'integer',
        'issuername' => 'string',
        'issuerurl' => 'string',
        'issueremail' => 'string',
        'claimid' => 'string',
        'claimcomment' => 'string',
        'dateissued' => 'integer',
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
            'issuername' => (string)$this->issuername,
            'issuerurl' => (string)$this->issuerurl,
            'issueremail' => (string)$this->issueremail,
            'claimid' => (string)$this->claimid,
            'claimcomment' => (string)$this->claimcomment,
            'dateissued' => (int)$this->dateissued,
        ];
    }

    public function searchableAs()
    {
        return 'badge_endorsement_index';
    }
}
