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
 * Model BadgeCriteriaMet
 * Defines criteria that were met for an issued badge
 */
class BadgeCriteriaMet extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'badge_criteria_met';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'issuedid' => 'integer',
        'critid' => 'integer',
        'userid' => 'integer',
        'datemet' => 'integer',
    ];

    // Relationships: BelongsTo
    public function badgeCriteria()
    {
        return $this->belongsTo(BadgeCriteria::class, 'critid');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'userid');
    }

    public function badgeIssued()
    {
        return $this->belongsTo(BadgeIssued::class, 'issuedid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'issuedid' => (int)$this->issuedid,
            'critid' => (int)$this->critid,
            'userid' => (int)$this->userid,
            'datemet' => (int)$this->datemet,
        ];
    }

    public function searchableAs()
    {
        return 'badge_criteria_met_index';
    }
}
