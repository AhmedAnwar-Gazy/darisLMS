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
 * Model BadgeBackpackOauth2
 * Default comment for the table, please edit me
 */
class BadgeBackpackOauth2 extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'badge_backpack_oauth2';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'usermodified' => 'integer',
        'timecreated' => 'integer',
        'timemodified' => 'integer',
        'userid' => 'integer',
        'issuerid' => 'integer',
        'externalbackpackid' => 'integer',
        'token' => 'string',
        'refreshtoken' => 'string',
        'expires' => 'integer',
        'scope' => 'string',
    ];

    // Relationships: BelongsTo
    public function user()
    {
        return $this->belongsTo(User::class, 'usermodified');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'userid');
    }

    public function oauth2Issuer()
    {
        return $this->belongsTo(Oauth2Issuer::class, 'issuerid');
    }

    public function badgeExternalBackpack()
    {
        return $this->belongsTo(BadgeExternalBackpack::class, 'externalbackpackid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'usermodified' => (int)$this->usermodified,
            'timecreated' => (int)$this->timecreated,
            'timemodified' => (int)$this->timemodified,
            'userid' => (int)$this->userid,
            'issuerid' => (int)$this->issuerid,
            'externalbackpackid' => (int)$this->externalbackpackid,
            'token' => (string)$this->token,
            'refreshtoken' => (string)$this->refreshtoken,
            'expires' => (int)$this->expires,
            'scope' => (string)$this->scope,
        ];
    }

    public function searchableAs()
    {
        return 'badge_backpack_oauth2_index';
    }
}
