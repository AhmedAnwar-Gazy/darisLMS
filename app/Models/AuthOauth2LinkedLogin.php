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
 * Model AuthOauth2LinkedLogin
 * Accounts linked to a users Moodle account.
 */
class AuthOauth2LinkedLogin extends Model
{
    use HasFactory, Notifiable, Searchable, HasApiTokens, Dispatchable, Queueable, SerializesModels;

    protected $table = 'auth_oauth2_linked_login';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'timecreated' => 'integer',
        'timemodified' => 'integer',
        'usermodified' => 'integer',
        'userid' => 'integer',
        'issuerid' => 'integer',
        'username' => 'string',
        'email' => 'string',
        'confirmtoken' => 'string',
        'confirmtokenexpires' => 'integer',
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

    // Typesense Searchable Configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => (string)$this->id,
            'timecreated' => (int)$this->timecreated,
            'timemodified' => (int)$this->timemodified,
            'usermodified' => (int)$this->usermodified,
            'userid' => (int)$this->userid,
            'issuerid' => (int)$this->issuerid,
            'username' => (string)$this->username,
            'email' => (string)$this->email,
            'confirmtoken' => (string)$this->confirmtoken,
            'confirmtokenexpires' => (int)$this->confirmtokenexpires,
        ];
    }

    public function searchableAs()
    {
        return 'auth_oauth2_linked_login_index';
    }
}
