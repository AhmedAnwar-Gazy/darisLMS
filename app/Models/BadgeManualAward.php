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
 * Model BadgeManualAward
 * Track manual award criteria for badges
 */
class BadgeManualAward extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'badge_manual_award';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'badgeid' => 'integer',
        'recipientid' => 'integer',
        'issuerid' => 'integer',
        'issuerrole' => 'integer',
        'datemet' => 'integer',
    ];

    // Relationships: BelongsTo
    public function badge()
    {
        return $this->belongsTo(Badge::class, 'badgeid');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'recipientid');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'issuerid');
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'issuerrole');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'badgeid' => (int)$this->badgeid,
            'recipientid' => (int)$this->recipientid,
            'issuerid' => (int)$this->issuerid,
            'issuerrole' => (int)$this->issuerrole,
            'datemet' => (int)$this->datemet,
        ];
    }

    public function searchableAs()
    {
        return 'badge_manual_award_index';
    }
}
