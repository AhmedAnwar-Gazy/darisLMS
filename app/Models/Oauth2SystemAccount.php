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
 * Model Oauth2SystemAccount
 * Stored details used to get an access token as a system user for this oauth2 service.
 */
class Oauth2SystemAccount extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'oauth2_system_account';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'timecreated' => 'integer',
        'timemodified' => 'integer',
        'usermodified' => 'integer',
        'issuerid' => 'integer',
        'refreshtoken' => 'string',
        'grantedscopes' => 'string',
        'email' => 'string',
        'username' => 'string',
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
            'refreshtoken' => (string)$this->refreshtoken,
            'grantedscopes' => (string)$this->grantedscopes,
            'email' => (string)$this->email,
            'username' => (string)$this->username,
        ];
    }

    public function searchableAs()
    {
        return 'oauth2_system_account_index';
    }
}
