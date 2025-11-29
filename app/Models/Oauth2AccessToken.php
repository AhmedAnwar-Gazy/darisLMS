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
 * Model Oauth2AccessToken
 * Stores access tokens for system accounts in order to be able to use a single token across multiple sessions
 */
class Oauth2AccessToken extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'oauth2_access_token';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'timecreated' => 'integer',
        'timemodified' => 'integer',
        'usermodified' => 'integer',
        'issuerid' => 'integer',
        'token' => 'string',
        'expires' => 'integer',
        'scope' => 'string',
    ];

    // Relationships: BelongsTo
    public function user()
    {
        return $this->belongsTo(User::class, 'usermodified');
    }

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'timecreated' => (int)$this->timecreated,
            'timemodified' => (int)$this->timemodified,
            'usermodified' => (int)$this->usermodified,
            'issuerid' => (int)$this->issuerid,
            'token' => (string)$this->token,
            'expires' => (int)$this->expires,
            'scope' => (string)$this->scope,
        ];
    }

    public function searchableAs()
    {
        return 'oauth2_access_token_index';
    }
}
