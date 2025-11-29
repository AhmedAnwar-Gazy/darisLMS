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
 * Model Oauth2RefreshToken
 * Stores refresh tokens which can be exchanged for access tokens
 */
class Oauth2RefreshToken extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'oauth2_refresh_token';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'timecreated' => 'integer',
        'timemodified' => 'integer',
        'userid' => 'integer',
        'issuerid' => 'integer',
        'token' => 'string',
        'scopehash' => 'string',
    ];

    // Relationships: BelongsTo
    public function oauth2Issuer()
    {
        return $this->belongsTo(Oauth2Issuer::class, 'issuerid');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'userid');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'timecreated' => (int)$this->timecreated,
            'timemodified' => (int)$this->timemodified,
            'userid' => (int)$this->userid,
            'issuerid' => (int)$this->issuerid,
            'token' => (string)$this->token,
            'scopehash' => (string)$this->scopehash,
        ];
    }

    public function searchableAs()
    {
        return 'oauth2_refresh_token_index';
    }
}
